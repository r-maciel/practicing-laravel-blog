<?php

namespace App\Http\Controllers;

Use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$string = $request->query('string');
    	if($string){
	    	/* Get all the posts order by latest with his user and category */
	    	$posts = Post::where('title', 'LIKE', '%'.$request->query('string').'%')
	    			->with('user', 'category')
	    			->latest()
	    			->paginate(5);
    	}
    	else{
    		$posts = [];
    	}
    	return view('posts.search', compact('posts', 'string'));
    }
}
