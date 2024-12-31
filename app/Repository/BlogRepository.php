<?php

namespace App\Repository;

use App\Models\Blog;
use App\Interfaces\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface {
    public function getBlogs()
    {
        return Blog::query()->orderBy('created_at', 'DESC')->paginate(3);
    }

    public function createBlog($data)
    {
        $blogData = $data;
        $blogData['user_id'] = auth()->user()->id;
        Blog::create($blogData);
    }

    public function updateBlog($data, $model)
    {
        $blogData = $data;
        $blogData['user_id'] = auth()->user()->id;
        $model->update($blogData);
    }

    public function deleteBlog($model)
    {
        $model->delete();
    }
}
