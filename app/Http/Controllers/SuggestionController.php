<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggestion;
use App\Book;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{
    public function show(){


    $suggestions = Suggestion::all();


    $book_id = $suggestions->pluck('book_id');

    $user_id = $suggestions->pluck('user_id');
    $data = array();
    $flag = '';
for ($i = 0; $i < $suggestions->count();$i++)
{
      //$flag = Book::find($book_id[$i])->title;

        $data[$i]['books_name'] = Book::find($book_id[$i])->title;

        $data[$i]['user_name'] = User::find($user_id[$i])->name;

}

    return view('suggestions.show')->with('data',$data);

    }
    public function create($id)
    {
      $user_id = Auth::id();
      Suggestion::create([
        'book_id' => $id,
        'user_id' => $user_id
      ]);
      return redirect()->route('suggestion.show');

    }
}
