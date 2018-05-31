<?php

namespace App;

use App\User;
use App\TokenInfo;
use App\TeamMember;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table Name
    protected $table='posts';
    //Primary Key
    public $primaryKey = 'id';

    public function user(){
    	return $this->belongsTo(User::class);
    
    }
    public function teamMembers(){
        return $this->belongsToMany(TeamMember::class);
    }

    public function token_infos(){
    	return $this->hasMany(TokenInfo::class);
    }
}
