<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

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
        toastr()->timeOut(1000)->closeButton()->addSuccess('Category added successfully');
        
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


    public function add_product()
    {

        $categories = Category::all();

        return view('admin.add_product', compact('categories'));
    }

    public function upload_product(Request $request)
    {

        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;

        $image = $request->image;
        if($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products' , $imagename);

            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeOut(1000)->closeButton()->addSuccess('Product added successfully');

        return redirect()->back();

    }

}
