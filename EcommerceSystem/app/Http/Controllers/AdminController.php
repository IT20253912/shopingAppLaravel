<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;

use App\Models\Product;


use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller {
    // public function view_catagory() {
    //     $data = Catagory::all();
    //     return view('admin.catagory', compact('data'));
    // }
    public function view_catagory() {
        $mainCategories = Catagory::whereNull('parent_id')->get();
        return view('admin.catagory', compact('mainCategories'));
    }

    public function add_catagory(Request $request) {
        $data = new Catagory;
        $data->catagory_name = $request->catagory;
        $data->parent_id = $request->parent_id;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_catagory($id) {
        $data = Catagory::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit_category($id) {
        $category = Catagory::findOrFail($id);
        return view('admin.edit_category', compact('category'));
    }

    public function update_category(Request $request, $id) {
        $category = Catagory::findOrFail($id);
        $category->catagory_name = $request->category_name;
        $category->save();
    
        return Redirect::route('view_catagory')->with('message', 'Category updated successfully.');
    }

    public function view_product()
    {
        $catagory = Catagory::all();
        return view('admin.product',compact('catagory'));
    }

    public function add_product(Request $request)
    {
        $product=new product;

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->dis_price;
        $product->discount_price=$request->quantity;
        $product->catagory=$request->catagory;
        $image=$request->image;
        $imagename=time() . '.'. $image ->getClientOriginalExtension();

        $request->image->move('product',$imagename);

        $product->image=$imagename;

        $product->save();

        return redirect()->back();
    }
}
