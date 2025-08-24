<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::all();
        return view('admin.tag.index',['tags'=> $tags]);
    }
    public function create() {
        return view('admin.tag.create');
    }
    public function store(Request $request) {
       $tag = new Tag();
       $tag->name = $request->name;
       $tag->save();
       return redirect()->route('admin.tag.index');
    }
    public function edit($id) {
        $tag = Tag::findOrfail($id);
        // dd('edit cate', $id);
        return view('admin.tag.edit', ['tag'=>$tag]);
    }
    public function update(Request $request, $id) {
       $tag = Tag::findOrfail($id);
       $tag->name = $request->name;
       $tag->save();
       return redirect()->route('admin.tag.index');
    }
    public function destroy(Request $request, $id) {
       $tag = Tag::findOrfail($id);
       $tag->delete();
       return redirect()->route('admin.tag.index');
    }
}
