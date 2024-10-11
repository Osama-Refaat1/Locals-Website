<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class AdminController extends Controller
{
    public function view_category()
    {
        $cats = Category::all();

        return view('admin.category', compact('cats'));
    }

    public function add_category(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();
        toastr()->closeButton()->addSuccess('Category added successfully');
        
        return redirect()->back();
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        toastr()->closeButton()->addWarning('Category deleted successfully');
        
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $category = Category::find($id);

        return view('admin.edit_category', compact('category'));
    }
    public function update_category(Request $request ,$id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category;
        $category->save();
        toastr()->closeButton()->addSuccess('Category updated successfully');
        
        return redirect('/view_category');
    }
}
