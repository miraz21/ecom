<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);
        
       
        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Category added');
    }

    public function edit($cat_id){
        $category = Category::find($cat_id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request){      
        $cat_id = $request->id;

        Category::find($cat_id)->update([
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('category.index')->with('Catupdated','Category Updated');
    }

    public function delete($cat_id){
        Category::find($cat_id)->delete();
        return Redirect()->back()->with('delete','Category Deleted Success');
    }

    public function inactive($cat_id){
        Category::find($cat_id)->update(['status' => 0]);
        return Redirect()->back()->with('Catupdated','Category active');
    }

    public function active($cat_id){
        Category::find($cat_id)->update(['status' => 0]);
        return Redirect()->back()->with('Catupdated','Category inactive');
    }
}
