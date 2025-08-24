<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('admin.post.index', ['posts' => $posts]);
    }

    public function create()
    { 
          $categories = Category::all();
          $tags = Tag::all();

          return view('admin.post.create', ['categories' => $categories, 'tags' => $tags]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
        $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
        $filePath = $request->file('thumbnail')->storeAs(
            'uploads',
            $fileName,
            'public'
        );
        
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->thumbnail = $filePath;
        $post->category_id = $request->category_id;
        $post->save();
        
        $post->tags()->sync($request->tags);

        return redirect()->route('admin.post.index');
    }

     public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        
        // dd('edit cate', $id);
        return view('admin.post.edit',['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
             $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'thumbnail' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        // TODO:: implement has file delete
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        if ($request->hasFile('thumbnail')) {
        // Delete old thumbnail if it exists
        if ($post->thumbnail && Storage::disk('public')->exists($post->thumbnail)) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        // Store new file
        $fileName = time() . '_' . $request->thumbnail->getClientOriginalName();
        $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');
        $post->thumbnail = $filePath;
    }

        $post = Post::findOrFail($id);
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        if($request->hasFile('thumbnail')) {
            
            $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs(
                'uploads',
                $fileName,
                'public'
            );
            $post->thumbnail = $filePath;
        }
        $post->save();
        $post->tags()->sync($request->tags);
        DB::commit();

        return redirect()->route('admin.post.index');
        } catch (\Throwable $th) {
        DB::rollBack();
            throw $th;
        }
    }
    public function destroy(Request $request, $id) {
       $post = Post::findOrfail($id);
       $post->delete();
       return redirect()->route('admin.post.index');
    }

}
