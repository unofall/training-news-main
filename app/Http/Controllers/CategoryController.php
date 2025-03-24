<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function show(){
        $category = Category::all();
        return view('admin.category.main', compact('category'));
    }

    function create(){
        return view('admin.category.create-category');
    }

    function add(Request $request){
        Category::create([
            'name' => $request->name,
        ]);
        return redirect('/admin/category');
    }

    function update(Request $request){
        $category = Category::find($request->id);
        return view('admin.category.update-category', compact('category'));
    }

    function updated(Request $request){
        Category::where('id', $request->id)->update([
            'name' => $request->name,
            'desc' => $request->desc
        ]);

        return redirect('admin/category');
    }

}
