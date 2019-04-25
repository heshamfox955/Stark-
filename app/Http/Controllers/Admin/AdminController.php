<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    //

    //====this method to login admin=====//

    public function login() {
        if(request()->isMethod('post')){
            $remeberme = request('remeberme') == 1 ? true : false ;
            if(auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')], $remeberme)) {
                return redirect('admin/home');
            } else {
                return redirect()->back();
            }
        }
        return view('admin.login');
    }

    //====logout form admin====//

    public function logout() {
        auth()->guard('admin')->logout();
        return redirect('admin/login');
    }

    public function index() {
        return view('admin.index');
    }

    public function addUsers() {
        if(request()->isMethod('post')) {
            $data = $this->validate(request(), [
                'name' => 'required|min:4|max:17',
                'email' => 'required|email|unique:admins',
                'password' => 'required|min:6',
            ]);
            $data['password'] = bcrypt(request('password'));
            if (request('user') == 0) {
                User::create($data);
                return redirect('admin/view/admins');
            } else {
                Admin::create($data);
                return redirect('admin/view/admins');
            }

        }
        return view('admin.add_admin');
    }

    public function viewAdmin() {

        $admins = Admin::all();
        //$admins = json_decode(json_encode($admins));
        return view('admin.view_admin', compact('admins'));
    }

    public function editAdmin($id, Request $request) {
        if($request->isMethod('post')) {
            $data = $this->validate(request(), [
                'name'  => 'required',
                'email'  => 'required|email|unique:admins,id',
                'password' => 'sometimes|nullable|min:6'
            ]);
            if(request()->has('password')) {
                $data['password'] = bcrypt(request('password'));
            }
            Admin::where(['id' => $id])->update($data);
            return redirect('admin/view/admins');
        }

        $admin = Admin::where(['id' => $id])->first();
        return view('admin.edit_admin', compact('admin'));
    }

    public function delAdmin($id) {
        Admin::where('id', $id)->delete();
        return redirect()->back();
    }

}
