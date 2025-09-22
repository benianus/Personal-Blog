<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $categories = Category::all();
        $posts = Post::latest()->paginate(3);

        return view('index', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    public function getPostsByCategory(Request $request)
    {
        $query = $request->query('q');
        $category = Category::with(['posts'])
            ->where('name', '=', ucfirst($query))
            ->first();
        $posts = $category->posts()->latest()->paginate(3);
        $categories = Category::all();

        return view('index', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        //validation using Request
        $attributes = $request->validated();

        // get the file from the request and store it in the public folder
        $path = $request->file('image')->store('images', 'public');

        // store the post in the database
        $post = Post::create([
            'title' => $attributes['title'],
            'body' => $attributes['body'],
            'image' => $path,
            'published_at' => Carbon::now()->toDateTimeString(),
            'user_id' => Auth::user()->id
        ]);

        // get tag and category ids
        $tag = Tag::where('name', '=', $attributes['tag'])->first();
        $category = Category::where('name', '=', $attributes['category'])->first();

        // attach the post with tag and a category
        $post->tags()->attach($tag->id);
        $post->categories()->attach($category->id);

        // finally redirect the user to the posts dashboard
        return redirect()->route('dashboard-posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        $post = Post::with(['user', 'tags'])->findOrFail($post->id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::where('id', '=', $post->id)->first();
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //validation using Request
        $attributes = $request->validated();

        // get the file from the request and store it in the public folder
        $path = $request->file('image')->store('images', 'public');

        // store the post in the database
        Post::where('id', '=', $post->id)
            ->update([
                'title' => $attributes['title'],
                'body' => $attributes['body'],
                'image' => $path,
                'user_id' => Auth::user()->id
            ]);

        // finally redirect the user to the posts dashboard
        return redirect()->route('dashboard-posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        // dd($post->id);

        Post::where('id', '=', $post->id)
            ->delete();

        return redirect()->route('dashboard-posts');    
    }

    public function dashboard()
    {
        return view('dashboard.main-board');
    }

    public function showPosts()
    {
        $posts = Post::with(['categories', 'user', 'tags'])->latest()->paginate(5);
        return view('dashboard.show-posts', [
            'posts' => $posts
        ]);
    }

    public function showCategories()
    {
        return view('dashboard.show-categories');
    }

    public function showTags()
    {
        return view('dashboard.show-tags');
    }
}
