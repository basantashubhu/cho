<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\TeamMember;

class ImageController extends Controller
{
    
    public function returnLogo($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

    public function returnCover($id){
        $post = Post::find($id);
        $id = $post->post_token;
        if(isset($post->cover_pic)){
            $file = Storage::disk('local')->get('posts'.DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.$post->cover_pic);
        }else{
            $file = Storage::disk('local')->get('noimage.jpg');
        }
        return new Response($file, 200);
    }
    public function returnMemberPhoto($id){
    	$tm = TeamMember::find($id);
    	// $id = $post->post_token;
        if(isset($tm->member_photo)){
            $file = Storage::disk('local')->get('posts'.DIRECTORY_SEPARATOR.'member_photo'.DIRECTORY_SEPARATOR.$tm->member_photo);
        }else{
        	$file = Storage::disk('local')->get('noimage.jpg');
        }
        return new Response($file, 200);
    }

    public function returnMilestone($id){
        $post = Post::find($id);
        // dd($post->teamMembers()->first()->milestone_photo);
        if(isset($post->teamMembers)){
            $file = Storage::disk('local')->get('posts'.DIRECTORY_SEPARATOR.'milestone_photo'.DIRECTORY_SEPARATOR.$post->teamMembers()->first()->milestone_photo);
        }else{
            $file = Storage::disk('local')->get('noimage.jpg');
        }
        return new Response($file, 200);
    }

}
