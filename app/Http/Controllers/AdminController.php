<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('SuperAdmin');
    }

    public function addAdmin(){
    	return view('pages.modals.new-admin');
    }

    public function storeAdmin(Request $request){
    	// dd($request->all());
    	$email = $request->input('email');
    	$user = User::whereEmail($email)->first();
    	if(!is_null($user)){
	    	$user->isAdmin = $request->input('role');
	    	$user->update();
            notify('Admin Contoller Message', $user->name.' is updated as '.$user->isAdmin.' of this site!', 'admin-dashboard');    		
	    	return $user->id;
    	}
    	return null;
    }
}
