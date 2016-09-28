<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $table = 'suggestions';
    protected $fillable = ['rating_point','reason','created_at', 'updated_at'];
    public function user()
  {
      return $this->belongsToMany('App\User', 'books_users_suggestions', 'suggestion_id', 'user_id')->wherePivot('user_id','=', Auth::user()->id)->withTimestamps();
  }
  public function book()
  {
    return $this->hasMany('App\Book', 'books_users_suggestions', 'book_id', 'suggestion_id')->withTimestamps();
  }
}
