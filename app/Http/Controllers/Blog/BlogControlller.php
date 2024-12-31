<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Interfaces\BlogRepositoryInterface;

class BlogControlller extends Controller
{
    private BlogRepositoryInterface $blogRepository;
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = $this->blogRepository->getBlogs();

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
        $data = $request->only('title', 'body');
        $this->blogRepository->createBlog($data);

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
        $data = $request->only('title', 'body');
        $this->blogRepository->updateBlog($data, $blog);

        return redirect()->route('blogs.index')->with('success', 'Blog updaed success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->blogRepository->deleteBlog($blog);
        return redirect()->back()->with('success', 'Blog Deleted');
    }
}
