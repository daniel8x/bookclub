<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['user_id','google_id','title','author','google_link_info','google_link_preview','description','publish_date','image','created_at', 'updated_at'];
    public function suggestion(){
      return $this->hasMany('App\Suggestion');
    }
}
