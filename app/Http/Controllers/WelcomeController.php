<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
    	/* Get only 6 elements, the difference here with what we'vw done before is that we're bringing a collection and not a single element like user with his posts, so we don't have $user->posts, is only $posts*/
    	$posts = Post::with('user', 'category')->latest()->take(5)->get();
    	return view('welcome', compact('posts'));
    }
}
