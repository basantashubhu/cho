<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function index(){
    	$unseen = Notification::whereSeen('unseen')->latest()->get();
    	$seen = Notification::whereSeen('seen')->latest()->get();
    	$later = Notification::whereSeen('later')->latest()->get();
    	return view('notify.index', compact('unseen', 'seen', 'later'));
    }

    public function edit($id){
    	$notice = Notification::find($id);
    	$notice->seen = 'seen';
    	$notice->save();
    }

    public function show($id){
    	$notice = Notification::find($id);
    	$notice->seen = 'later';
    	$notice->save();
    }
}
