<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;
use App\TeamMember;
use App\Post;

class TeamMemberController extends Controller
{
    public function index(){
    	$mems = TeamMember::all();
		return $mems;
    }


    public function create(){
		return view('posts.team-member');
    }


    public function store(Request $request){
		$mem = new TeamMember;
		$post = Post::find($request->input('post_id'));
		$this->checkSaveMember($mem, $request);
		$mem->save();
		$post->teamMembers()->save($mem);
        $id = $post->id;
        if($request->input('another_member')){
            if(isset($mem->milestone_photo) && !empty($mem->milestone_photo)){
                $stone = 1;                
                return view('posts.team-member', compact('id'))->with('stone', $stone);
            }
            return view('posts.team-member', compact('id'));
        }
        else{
            return view('posts.show', compact('post'));
        }
    }


    protected function checkSaveMember($mem,$request){
		if($request->hasFile('member_photo')){
            // dd('true');
			$filename_member = $this->saveFile($request->file('member_photo'), 'member_photo');
		}
		if($request->hasFile('milestone_photo')){
			$filename_milestone = $this->saveFile($request->file('milestone_photo'), 'milestone_photo');
		}
		$mem->name = $request->input('name');
		$mem->position = $request->input('position');
		$mem->fb_link = $request->input('fb_link');
		$mem->linked_link = $request->input('linked_link');
        // if(isset($request->input('twitter_link'))){
        //     $mem->twitter_link = $request->input('linked_link');
        // }
		if(isset($filename_member)){
            $mem->member_photo = $filename_member;
        }
         if(isset($filename_milestone)){
            $mem->milestone_photo = $filename_milestone;
         }  
    }
            
    protected function saveFile($file, $path){
        // $file = $req->milestone_photo;
        //Get file name with extension
        // dd($req->milestone_photo);
        $filenameWithExt = $file->getClientOriginalName();
        //Get just file name
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //Get just extension
        $extension=$file->getClientOriginalExtension();
        //file name to store
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        //upload image
        $folder = $this->getFolder();
        Storage::disk('local')->put(
            $folder.DIRECTORY_SEPARATOR.$path.DIRECTORY_SEPARATOR.$fileNameToStore,
             File::get($file)
         );
        return $fileNameToStore;
    }


    protected function getFolder(){
        return 'posts';
    }


	public function update(Request $request,$id){
        // dd($request->all());
        $req[] = [];
        foreach($request->input('member_id') as $index => $id){
            $req[$index]['name'] = $request->input('name')[$index];
            $req[$index]['position'] = $request->input('position')[$index];
            $req[$index]['member_photo'] = isset($request->file('member_photo')[$index]) ? $request->file('member_photo')[$index]: '';
            $req[$index]['milestone_photo'] = isset($request->file('milestone_photo')[$index]) ? $request->file('milestone_photo')[$index]: '';
            // dd($request->file('milestone_photo')[$index]);
            $req[$index]['fb_link'] = $request->input('fb_link')[$index];
            $req[$index]['linked_link'] = $request->input('linked_link')[$index];
            $req[$index]['twitter_link'] = $request->input('twitter_link')[$index];
        }
        foreach($request->input('member_id') as $index => $id){
            $newreq = (object) $req[$index];
            $mem = TeamMember::find($id);
            $mem->name = $newreq->name;
            $mem->position = $newreq->position;
            $mem->fb_link = $newreq->fb_link;
            $mem->linked_link = $newreq->linked_link;
            $mem->twitter_link = $newreq->twitter_link;
            if($newreq->milestone_photo != ''){
                $filename_milestone = $this->saveFile($newreq->milestone_photo, 'milestone_photo');                
                $mem->milestone_photo = $filename_milestone;
            }
            if($newreq->member_photo != ''){
                $filename_member = $this->saveFile($newreq->member_photo, 'member_photo');                
                $mem->member_photo = $filename_member;
            }
            // dd($mem);
            $mem->update();
        }
        $post = Post::find($request->input('post_id')[0]);
        // dd($post);
        return view('posts.show', compact('post'));
	}
}
