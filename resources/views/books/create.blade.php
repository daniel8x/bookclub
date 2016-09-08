@extends('layouts.app')
@section ('head.title')
Book Club
@stop
@section('content')


    <div class="container">
      <h2>ADD BOOK</h2>
      <form action="{{ route('book.store')}}" method="post">
         {{ csrf_field() }}
        <div class="form-group">
          <label for="title">Title</label>
          <input type="input" class="form-control" id="title" name="title" placeholder="Enter Title">
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <input type="input" class="form-control" id="author" name="author" placeholder="Enter Author">
        </div>
        <div class="form-group">
          <label for="other">Other Information</label>
          <input type="input" class="form-control" id="other" name="other" placeholder="Enter Other Information">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" rows="5" name="description" id="description" placeholder="Enter Description"></textarea>
        </div>
        <div class="form-group">
          <label for="link">Link</label>
          <input type="input" class="form-control" id="link" name="link"placeholder="http://">
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="input" class="form-control" id="image" name="image" placeholder="http://">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

    </div>





@stop
