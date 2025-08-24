<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.category.index',['categories'=> $categories]);
    }
    public function create() {
        return view('admin.category.create');
    }
    public function store(Request $request) {

    $validated = $request->validate([
        'name' => 'required|max:255',
    ]);

       $category = new Category();
       $category->name = $request->name;
       $category->save();
       return redirect()->route('admin.category.index');
    }
    public function edit($id) {
        $category = Category::findOrfail($id);
        // dd('edit cate', $id);
        return view('admin.category.edit', ['category'=>$category]);
    }
    public function update(Request $request, $id) {
       $category = Category::findOrfail($id);
       $category->name = $request->name;
       $category->save();
       return redirect()->route('admin.category.index');
    }
    public function destroy(Request $request, $id) {
       $category = Category::findOrfail($id);
       $category->delete();
       return redirect()->route('admin.category.index');
    }
}
