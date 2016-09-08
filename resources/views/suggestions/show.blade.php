@extends('layouts.app')
@section ('head.title')
Book Club
@stop
@section('content')
<div class="container">
        <span style="text-align: center;"><h2>Suggestions</h2></span>
      <ul class="list-group">
        @foreach ($data as $key)

        <li class="list-group-item">

        {{$key['books_name']}}
             <span style="text-align:right;float:right;"><button type="button" class="btn btn-primary">{{$key['user_name']}} </button>
        </span>

              </li>
      @endforeach
      </ul>
    </div>
@stop
