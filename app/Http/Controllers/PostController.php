<?php

namespace App\Http\Controllers;

use App\{Category,Post,Tag};
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth')->except('index','show');
    }

    public function index(){
        $posts =  Post::latest()->paginate(6);
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post){
        return view('posts.show',compact('post'));
    }

    public function create(){
        return view('posts.create',[
            'post'  =>  new Post(),
            'categories'    =>  Category::get(),
            'tags'    =>  Tag::get(),
        ]);
    }

    public function store(PostRequest $request){
        //  $post = new Post;
        //  $post->title = $request->title;
        //  $post->slug = Str::slug($request->title);
        //  $post->body = $request->body;
        //  $post->save();

        // $this->validate($request, [
        //     'title' =>  'required|min:3',
        //     'body' =>  'required',
        // ]);


        $post = Post::create([
            'title' =>  $request->title,
            'slug' =>  Str::slug($request->title),
            'category_id'   =>  $request->category,
            'body'  =>  $request->body,
        ]);
        $post->tags()->attach(request('tags'));
        // session()->flash('success','The post was created');
        session()->flash('success','The post was created');
        return redirect()->route('posts');
    }

    public function edit(Post $post){
        return view('posts.edit',[
            'post'  =>  $post,
            'categories'    =>  Category::get(),
            'tags'    =>  Tag::get(),
        ]);
    }
    
    public function update(PostRequest $request, Post $post){
        
        $post->update([
            'title' =>  $request->title,
            'body' =>  $request->body,
            'category_id'   =>  $request->category,
        ]);
        $post->tags()->sync(request('tags'));

        session()->flash('success','The post was updated');
        return redirect()->route('posts');
    }

    public function destroy(Post $post){
        $post->tags()->detach();
        $post->delete();
        session()->flash('success','The post was deleted');
        return redirect()->route('posts');
    }
}
