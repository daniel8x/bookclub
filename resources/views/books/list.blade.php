@extends('layouts.app')
@section ('head.title')
Book Club
@stop
@section('content')
<div class="container">
      <h2>Book List</h2>
      <ul class="list-group">
        @foreach ($books as $book)
        <li class="list-group-item"> <a href="{{route('book.show', $book->id)}}">{{ $book->title}}</a>

              </li>
      @endforeach
      </ul>
    </div>
@stop
