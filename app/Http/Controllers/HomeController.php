<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class HomeController extends Controller
{
    #Link page by category_id & tag_id // pagination

    public function index(Request $request) {
        $posts = Post::when($request->category_id, function ($query, $category_id) {
                 $query->where('category_id', $category_id);
                 
         })->when($request->search, function ($query, $search){
                 $query->where('title', 'LIKE', '%'.$search.'%');

         })->when($request->tag_id, function ($query, $tag_id){
                 $query->whereHas('tags', function($sub_query) use($tag_id){
                    $sub_query->where('id', $tag_id);
                 });
         })->paginate(10)
           ->withQueryString();
        $categories = Category::all();
        $tags = Tag::all();
        return view('index', ['posts' => $posts, 'navbar_categories' => $categories, 'sidebar_tags' => $tags]);
    }
    
    public function article(Request $request, $id){
        $post = Post::findOrfail($id);
        return view('article', ['post' => $post]);
        $tags = Tag::all();
        return view('index', ['posts' => $posts, 'navbar_categories' => $categories, 'sidebar_tags' => $tags]);
    }
}
