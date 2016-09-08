<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['user_id','title','author','other','description','link','image','created_at', 'updated_at'];
}
