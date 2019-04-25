<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PlayList;
use App\Admin;
use App\Category;

class PlayListController extends Controller
{
    public function addPlaylist($id = null) {
        if(request()->isMethod('post')){
            $data = $this->validate(request(), [
                'name'      => 'required|min:4',
                'user_id'   => 'required',
                'cat_id'    => 'required',
                'status'    => 'required',
            ]);
            PlayList::create($data);
            return redirect('admin/view/playlists');
        }

        $admin = Admin::get()->first();
        $category = Category::get();
        return view('admin.playlist.add_playlist', compact('category', 'admin'));
    }

    public function editPlaylist($id) {
        if(request()->isMethod('post')){
            $data = $this->validate(request(), [
                'name'      => 'required|min:4',
                'user_id'   => 'required',
                'cat_id'    => 'required',
                'status'    => 'required',
            ]);
            PlayList::where('id', $id)->update($data);
            return redirect('admin/view/playlists');
        }

        //$admin =  Admin::where(['id' => $id])->first();
        $play = PlayList::where('id', $id)->first();
        $category = Category::get();
        return view('admin.playlist.edit_playlist', compact('category', 'admin', 'play'));
    }

    public function deletePlaylist($id) {
        PlayList::where('id', $id)->delete();
        return redirect('admin/view/playlists');
    }

    public function viewPlaylist() {
        $playlists = PlayList::all();
        return view('admin.playlist.view_playlist', compact('playlists'));
    }
}
