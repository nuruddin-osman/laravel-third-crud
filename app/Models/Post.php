<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable = ["name", "email", "phone", "address", "department", "stID", "image"];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
