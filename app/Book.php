<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['google_id','title','author','google_link_info','google_link_preview','description','publish_date','image','created_at', 'updated_at'];

    public function user()
  {
      return $this->belongsToMany('App\User', 'books_users_suggestions', 'book_id', 'user_id')->withTimestamps();
  }
  public function suggestion()
  {
    return $this->belongsToMany('App\Suggestion', 'books_users_suggestions', 'book_id', 'suggestion_id')->withTimestamps();
  }
}
