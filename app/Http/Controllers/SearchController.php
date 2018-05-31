<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
    	// dd($request->input('end_date'));
    	$posts = Post::where('ico_name', 'like', '%'.$request->input('search_box').'%')
				    	->orWhere('body', 'like', '%'.$request->input('search_box').'%')
				    	// ->where('categories', 'like', '%'.$request->input('category').'%')
				    	->where('country_of_operation', 'like', '%'.$request->input('country').'%')
				    	->where('ico_start_date', '>=', $request->input('start_date'))	    	
				    	->where('ico_end_date', '<=', $request->input('end_date'))	    	
				    	->paginate(1);
		$tot = count($posts);
    	return view('posts.table', compact('posts', 'tot'));
    	// return $posts;
    }
}
