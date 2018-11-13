@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-light"> <-- Go Back</a> <br><br>
    <h1>{{$post->title}}</h1>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    <div>
        {!!$post->body!!}
    </div>
    <br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        <a class="btn btn-info" href="/posts/{{$post->id}}/edit">Edit</a>

        {!!Form::open(['action' => ['PostsController@destroy', $post->id, 'method' => 'POST', 'class' => 'float-right']])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
        {!!Form::close()!!}
        @endif
    @endif
@endsection


{{--  <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary"> Edit </a>

{!!Form::open(['action' => ['PostsController@destroy', $post->id, 'methos' => "POST", 'class' => 'pull-right' ]])!!}
{{FOrm::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close() !!}  --}}
