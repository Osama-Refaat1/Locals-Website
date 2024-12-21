<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;
use Illuminate\Support\Facades\Http;
use OpenAI;

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



    public function view_product() {

        $product = Product::paginate();
        return view('admin.view_product' , compact('product'));
    }




    public function generateDescription(Request $request)
    {
        // Retrieve title and category from the request
        $title = $request->input('title');
        $category = $request->input('category'); // Retrieve category if needed
    
        // Make the request to OpenAI's API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),  // Correct way to get the API key
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',  // Use the correct model name (e.g., 'gpt-4')
            'messages' => [
                [
                    'role' => 'user',
                    'content' => "Write a product description for a product called '$title' in the '$category' category."
                ],
            ],
        ]);
    
        // Check if the response is successful and contains the expected data
        if ($response->successful()) {
            // Extract the generated description from the API response
            $description = $response->json()['choices'][0]['message']['content'];
            dd($description); // Debugging to view the result
            // Return the generated description as a JSON response
            return response()->json(['description' => $description]);
        } else {
            // Handle errors from the API
            return response()->json(['error' => 'Error generating description'], 500);
        }
    }


}
