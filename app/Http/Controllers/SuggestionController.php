<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggestion;
use App\Book;
use App\User;
use App\Relation;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{
    public function show(){

      $books = Book::with('user','suggestion')->get();
      $countBooks = count($books);
      
      for ($i = 0; $i<$countBooks; $i++){

       if($books[$i]->suggestion->isEmpty()) $books->forget($i);
      }


      $books = $books->values();

      $users = $books->pluck('user');

      $suggestions = $books->pluck('suggestion');
    //  dd($suggestions);

 return view('suggestions.show')->with('books',$books)->with('users',$users)->with('suggestions',$suggestions);
    }


    public function usershow(){
      $suggestions = Relation::with('book','suggestion')->where('user_id','=',Auth::user()->id)->where('suggestion_id','!=','null')->get();


      return view('suggestions.usershow')->with('suggestions',$suggestions);

    }
    public function delete($id){
        $suggestions = Suggestion::find($id);
        $suggestions->delete();
        $response = array(
            'status' => 'success',
            'msg' => 'ok'
        );
        return \Response::json($response);
      }
    public function store(Request $request)
    {
      $book_id = $request->json('book_id');
      $user_id = Auth::user()->id;
      $reason = $request->json('reason');
      $rating = $request->json('rating');

      $suggestionCreate = Suggestion::create([
        'rating_point'=>$rating,
        'reason' => $reason
      ]);
      $suggestionId = $suggestionCreate->id;
      $run = DB::table('books_users_suggestions')
      ->where('book_id',$book_id)
      ->where('user_id',$user_id)->update(['suggestion_id'=>$suggestionId]);



             $response = array(
                 'status' => 'success',
                 'boook' => $book_id,
                 'user' => $user_id,
                 'msg' => $run
             );
             return \Response::json($response);


    }
}
