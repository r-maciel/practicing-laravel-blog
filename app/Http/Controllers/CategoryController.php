<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
    	$posts = $category->posts()->with('user')->latest()->paginate(5);
    	return view('posts.categories', compact('category', 'posts'));
    }
}
