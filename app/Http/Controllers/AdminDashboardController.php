<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Image;
use App\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AdminDashboardController extends Controller
{
    protected $allowedFileExtentions = ['jpg', 'png', 'gif', 'PNG', 'GIF', 'JPG'];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'IsAdmin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('admin-dashboard')->with('posts',$posts);
    }

    //change logo of the company
    public function changeLogo(Request $request){
        // dd($request->all());
        // dd($request->file);
        $file = $request->file('file');
        $filename = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
        $fileNameToStore='logo'.DIRECTORY_SEPARATOR.$filename.'_'.time().'.'.$file->getClientOriginalExtension();
        // dd($fileNameToStore);
        $path = Storage::disk('local')->put(
            $fileNameToStore,
            File::get($file)
        );
        $logo = new Image;
        $logo->company_name=$request->websiteName;
        $logo->logo = $fileNameToStore;
        $logo->save();
        // dd($logo);
        return redirect()->back();
    }
        protected function allowedFile(UploadedFile $file){
            return in_array($file->getClientOriginalExtension(), $this->allowedFileExtentions);
        }

    public function publish(Request $request, $id)
    {
        $post=Post::find($id);
        if($request->publish == 'on'){
            $post->published=1;
        }else{
              $post->published=0; 
        }
        $post->update();
        return 'updated';
    }

    public function subscribers(){
        $users = User::all();
        return view('subscribers', compact('users'));
    }

    public function allPosts(){
        $posts = Post::all();
        return view('allposts', compact('posts'));
    }
        
}



