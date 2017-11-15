@extends('layouts.app')
@section('content')
<h1>{{$game->title}}</h1>
<h4>Catergory: {{$game->category}}</h4>
<h4>Price: € {{$game->price}}</h4>
<h4>Avg. Rate: xx/5</h4>
<h4>Rate this game:
{!! Form::open(['action'=>'RatesController@store','method'=>'POST']) !!}
    <div class="form-group">
        {{Form::select('rate',array('5'=>'5','4.5'=>'4.5','4'=>'4','3.5'=>'3.5','3'=>'3','2.5'=>'2.5','2'=>'2','1.5'=>'1.5','1'=>'1'))}}
        /5
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}</div>
{!! Form::close() !!}    

</h4>
<a href="/list" class="btn btn-default">Back to List</a>
@endsection