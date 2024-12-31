<?php

namespace App\Interfaces;

interface  BlogRepositoryInterface
{
    public function getBlogs();
    public function createBlog($data);
    public function updateBlog($data, $model);
    public function deleteBlog($model);
}
