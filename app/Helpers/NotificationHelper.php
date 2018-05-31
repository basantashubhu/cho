<?php

use App\Notification;

function notify($name,$msg = '', $link = ''){
	$notice = new Notification;
	$notice->name = $name;
	$notice->msg = $msg;
	$notice->link = $link;
	$notice->save();
}
function test($msg){
	echo $msg;
}

function notifyCount(){
	$notices = Notification::whereSeen('unseen')->get();
	return count($notices);
}