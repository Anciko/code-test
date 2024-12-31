<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::query()->orderBy('created_at', 'DESC')->paginate(3);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blogData = $request->only('title', 'body');
        $blogData['user_id'] = auth()->user()->id;
        Blog::create($blogData);

        return redirect()->route('blogs.index')->with('success', 'Blog created success.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blogData = $request->only('title', 'body');
        $blogData['user_id'] = auth()->user()->id;
        Blog::where('id', $blog->id)->update($blogData);

        return redirect()->route('blogs.index')->with('success', 'Blog updaed success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('success', 'BLog Deleted');
    }
}
