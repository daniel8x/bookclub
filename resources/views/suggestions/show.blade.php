@extends('layouts.app')
@section ('head.title')
Book Club
@stop
@section('content')
<div class="container">
        <span style="text-align: center;"><h2>Suggestions</h2></span>

          <div class="panel-group" id="accordion">

              @foreach($suggestions as $suggestion)

          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                  {{ $suggestion->book->title }}</a>
                <button type="button" class="btn btn-success">Pick</button>

              </h4>
            </div>



            <div id="collapse1" class="panel-collapse collapse in">
              <div class="panel-body">

                <span>Recommended by :   {{ $suggestion->user->name }}</span><br>





              </div>
            </div>




          </div>

  @endforeach

        </div>
    </div>
@stop
