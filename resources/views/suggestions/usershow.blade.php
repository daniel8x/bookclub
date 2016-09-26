@extends('layouts.app')
@section ('head.title')
Book Club
@stop
@section('content')
<div class="container">
        <span style="text-align: center;"><h2>Suggestions</h2></span>
      <ul class="list-group" id="suggestionList">
        @foreach($suggestions as $suggestion)

        <li class="list-group-item">

        {{ $suggestion->book->title }}
             <span style="float:right;">
               <button type="button" class="btn btn-primary">Edit</button>
               <button type="button" class="btn btn-primary" onclick="deleteSuggestion({{$suggestion->id}})" >Remove</button>
        </span>

              </li>
      @endforeach
      </ul>
    </div>
@stop
