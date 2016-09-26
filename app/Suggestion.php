<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $table = 'suggestions';
    protected $fillable = ['user_id','book_id','rating_point','reason','created_at', 'updated_at'];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function book()
    {
      return $this->belongsTo('App\Book');
    }
}
