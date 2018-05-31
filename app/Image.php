<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $nullable = ['company_name'];
    protected $fillable = ['compony_name', 'logo'];
}
