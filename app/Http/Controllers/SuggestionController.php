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


    $suggestions = Suggestion::with('book','user')->get();

    // $jsonSuggestion = array();
    // $i = 0;
    // while ($i < Suggestion::with('book','user')->get()->count()){
    //     $jsonSuggestion[$i] = 'test';
    //     $i++;
    // }
    // json_encode($jsonSuggestion);
    // echo json_decode($jsonSuggestion,0);
//$test = json_encode($test);




    return view('suggestions.show')->with('suggestions',$suggestions);



    }


    public function usershow(){

      $suggestions = Suggestion::with('book')->where('user_id', Auth::user()->id)->get();
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
      // $user_id = Auth::id();
      // Suggestion::create([
      //   'book_id' => $id,
      //   'user_id' => $user_id
      // ]);
      // return redirect()->route('suggestion.show');
      $book_id = $request->json('book_id');
      $reason = $request->json('reason');
      $rating = $request->json('rating');

      Suggestion::create([
        'book_id' => $book_id,
        'rating_point'=>$rating,
        'reason' => $reason,
        'user_id' => Auth::user()->id

      ]);
             $response = array(
                 'status' => 'success',
                 'msg' => 'ok'
             );
             return \Response::json($response);


    }
}
