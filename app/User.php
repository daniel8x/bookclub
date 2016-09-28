<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Authenticatable
{
    use EntrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function book()
  {
      return $this->belongsToMany('App\Book', 'books_users_suggestions', 'book_id', 'user_id')->withTimestamps();
  }
  public function suggestion()
{
    return $this->belongsToMany('App\Suggestion', 'books_users_suggestions', 'suggestion_id', 'user_id')->wherePivot('user_id', Auth::user()->id)->withTimestamps();
}

}
