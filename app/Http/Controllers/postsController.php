<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Post;
use DB;

class postsController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsAdmin',['except'=>['index','show','create', 'store']]); //index and show page can be viewed by anyone
    }
    public function index()
    {
        // $posts = Post::orderBy('created','desc')->take(10)->get(); //->take(10) will show 10 results only
        //pagination
        $posts = Post::where('published',1)->orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts',$posts);
    }

    public function create()
    {
        return view('posts.create');
    }
    protected function getFolder($token){
        // dd($token);
        return 'posts'.DIRECTORY_SEPARATOR.$token;
    }
    protected function saveFile($token, $request){
        //Get file name with extension
        $filenameWithExt = $request->file('ico_logo')->getClientOriginalName();
        //Get just file name
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //Get just extension
        $extension=$request->file('ico_logo')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        //upload image
        $folder = $this->getFolder($token);
        Storage::disk('local')->put(
            $folder.DIRECTORY_SEPARATOR.$fileNameToStore,
             File::get($request->file('ico_logo'))
         );
        return $fileNameToStore;
    }   
    protected function setValues($post, $request){
        // Handle file upload
        if($request->hasFile('ico_logo')){
            $fileNameToStore = $this->saveFile($post->post_token,$request);
        }else{
            $fileNameToStore = $post->cover_pic;
        }

        $post->type_of_application=$request->input('type_of_application');
        $post->ico_name=$request->input('ico_name');
        $post->ico_slogan=$request->input('ico_slogan');
        $post->website_url=$request->input('website_url');
        $post->country_of_operation=$request->input('country_of_operation');
        $post->link_to_video=$request->input('link_to_video');
        $post->body=$request->input('body');
        
        $post->user_id = 0;
        if(isset($fileNameToStore)){
            $post->cover_pic=$fileNameToStore;            
        }

        $post->token_name=$request->input('token_name');
        $post->token_type=$request->input('token_type');
        $post->platform=$request->input('platform');
        $post->pre_ico_price=$request->input('pre_ico_price');
        $post->current_ico_price=$request->input('current_ico_price');
        $post->total_token_sale=$request->input('total_token_sale');
        $post->total_token_sold=$request->input('total_token_sold');
        $post->restricted_country = $request->input('restricted_country');
        $post->bounty = $request->input('bounty');
        $post->link_to_bounty = $request->input('link_to_bounty');
        $post->minimum_investment = $request->input('minimum_investment');

        $post->accepting = $request->input('accepting');
        $post->soft_cap = $request->input('soft_cap');
        $post->hard_cap = $request->input('hard_cap');
        $post->distributed_ico = $request->input('distributed_ico');
        $post->ico_start_date= $request->input('ico_start_date');
        $post->ico_end_date= $request->input('ico_end_date');
        $post->link_to_whitepaper=$request->input('link_to_whitepaper');
        $post->whitelist=$request->input('whitelist');

        if($request->input('kyc') == 'Yes')
            $post->kyc= 'Y';
        else
            $post->kyc= 'N';


        $post->bonus=$request->input('bonus');
        $post->pre_sale_bonus=$request->input('pre_sale_bonus');
        $post->main_sale_bonus=$request->input('main_sale_bonus');


        // $post->category=$request->input('category');
        $categories='';
        foreach ($request->input('category') as $key => $value) {
            $categories .= $value.',';
        }
        $post->categories= $categories;

        $post->facebook_link=$request->input('facebook_link');
        $post->bitcointalk_link=$request->input('bitcointalk_link');
        $post->twitter_link=$request->input('twitter_link');
        $post->github_link=$request->input('github_link');
        $post->medium_link=$request->input('medium_link');
        $post->telegram_link=$request->input('telegram_link');
        $post->reddit_link=$request->input('reddit_link');
        $post->contact_email=$request->input('contact_email');

    } 
    public function store(Request $request)
    {
        $this->validate($request,[
            'ico_name'=>'required',
            'ico_logo'=>'image|max:1999' // image validation
        ]);           

        //create Post
        $post=new Post;
        $post->post_token = uniqid(5);
        $this->setValues($post, $request);
        $post->save();
        $id = $post->id;

        notify('New Post', 'An ICO is posted and ready to publish', 'posts/'.$id);
        return view('posts.team-member', compact('id'))->with('success','Your ICO will be posted after review.');
}

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        if(auth()->user()->isAdmin == 1){
            return view ('posts.edit')->with('post',$post);            
        }

        return view ('posts.edit')->with('post',$post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'ico_logo'=>'image|max:1999'
        ]);

        $post = Post::find($id);
        $this->setValues($post, $request);
        $post->update();
        notify('Post Updated', 'An ICO named "'.$post->ico_name.'" is updated recently.', 'posts/'.$post->id);
        $mems = $post->teamMembers;
        if(count($mems)>0){
            return view('posts.team-member-edit', compact('id', 'mems'))->with('success','Your ICO will be posted after review.');       
        }else{
            return view('posts.show', compact('post'))->with('success','Your ICO is updated.');
        }            
    }

    public function destroy($id)
    {
        $post=Post::find($id);
        //Check for administrative permission
        if(auth()->user()->isAdmin == 'user'){
            return redirect ('/posts')->with('error','You are not authorized');
        }

        if($post->ico_logo!='noimage.jpg'){
            //Delete image
            $folder = $this->getFolder();
            Storage::delete($folder.DIRECTORY_SEPARATOR.$post->cover_pic);
        }

    notify('Post Delete', 'An ICO named "'.$post->ico_name.'" is deleted by '.$auth()->user()->name.'.');
        $post->delete();
        return redirect()->back()->with('success','Post deleted');
    }
    
}
