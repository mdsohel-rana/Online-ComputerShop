@extends('layouts.app')

@section('content')
<br>

    <h1>Edit or Update Product</h1>
    <br>

    {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'About Product')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title and Price'])}}
           
        </div>

        <div class="form-group">
                {{Form::label('body', 'Product Description')}}
                {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Product Description'])}}
               
        </div>
        <div class="form-group">
                {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update Product', ['class' => 'btn btn-primary float-right'])}}
    {!! Form::close() !!}

@endsection