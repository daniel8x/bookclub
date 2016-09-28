<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model{
  protected $table = 'books_users_suggestions';
      protected $fillable = ['user_id','book_id','suggestion_id','created_at', 'updated_at'];
  public function user()
{
  return $this->belongsTo('App\User');
}
public function book()
{
  return $this->belongsTo('App\Book');
}
public function suggestion()
{
  return $this->belongsTo('App\Suggestion');
}
}
