<?php

namespace App\Http\Controllers\Community;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;

class PostsController extends Controller
{
    public function show(Post $post)
    {

        return view('community.show')->with('post', $post)->with('categories', Category::all());
    }

    public function category(Category $category)
    {
        return view('community.category')->with('category', $category)->with('posts', $category->posts()->searched()->simplePaginate(2))->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function tag(Tag $tag)
    {

        return view('community.tag')->with('tag', $tag)->with('posts', $tag->posts()->searched()->simplePaginate(2))->with('tags', Tag::all())->with('categories', Category::all());
    }
}
