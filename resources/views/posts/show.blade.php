@extends('layouts.app')

@section('content')
    <br>
    
    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
    <br>
    <br>
    <div>
        {!! $post->body !!}
    </div>
    <hr>
    <small>Seller--- {{$post->created_at}} || By- {{$post->user->name}}</small>
    
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-info float-right"> Edit or Update </a>

        {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
             {{Form::hidden('_method', 'DELETE')}}
             {{Form::submit('Delete Product', ['class' => 'btn btn-danger'])}}
        {!!Form::close() !!}
        @endif
    @endif
    <hr>
    
    <a href="/posts" class="btn btn-primary float-right">Go Back</a>
@endsection