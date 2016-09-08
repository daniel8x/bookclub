@extends('layouts.app')
@section ('head.title')
Book Club
@stop
@section('content')


    <div class="container">
      <h2>EDIT BOOK</h2>
      <form action="{{ route('book.update',$book->id) }}" method="POST">
         {{ csrf_field() }}
        <div class="form-group">
          <label for="title">Title</label>
          <input type="input" class="form-control" id="title" name="title" value="{{$book->title}}"</input>
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <input type="input" class="form-control" id="author" name="author" value="{{$book->author}}">
        </div>
        <div class="form-group">
          <label for="other">Other Information</label>
          <input type="input" class="form-control" id="other" name="other" value="{{$book->other}}">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" rows="5" name="description" id="description">{{$book->description}}</textarea>
        </div>
        <div class="form-group">
          <label for="link">Link</label>
          <input type="input" class="form-control" id="link" name="link" value="{{$book->link}}">
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="input" class="form-control" id="image" name="image" value="{{$book->image}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
@stop
