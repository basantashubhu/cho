<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Image;

class pagesController extends Controller
{
    public function index(){
        // $image = Image::latest()->first();
    	$posts=Post::where('published',1)->latest()->take(8)->get();
    	// return $post;
    	return view('pages.index', compact('posts'));

    }
    public function about(){
    	return view('pages.about');
    }
    public function services(){
    	return view('pages.services');
    }
}
