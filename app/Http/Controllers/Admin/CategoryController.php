<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory() {
        if(request()->isMethod('post')){
            $data = $this->validate(request(), [
                'block'  => 'required',
                'name' => 'required|min:4|max:17|unique:categories'
            ]);
            Category::create($data);
            return redirect('admin/view/categories');
        }
        return view('admin.category.add_category');
    }

    public function editCategory($id = null) {
        if(request()->isMethod('post')) {
            $data = $this->validate(request(), [
                'block'  => 'required',
                'name' => 'required|min:4|max:17|unique:categories'
            ]);
            Category::where('id', $id)->update($data);
        }
        $cats = Category::where('id', $id)->first();
        return view('admin.category.edit_category', compact('cats'));
    }

    public function delCategory($id) {
        Category::where('id', $id)->delete();
        return redirect('admin/view/category');
    }

    public function viewCategory() {
        $cats = Category::get();
        return view('admin.category.view_category', compact('cats'));
    }

}
