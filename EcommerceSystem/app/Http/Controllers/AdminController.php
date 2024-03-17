<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;

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
}
