@extends('layouts.app')

@section('content')
<br>

    <h1>Add a New Product</h1>
    <br>

    {!! Form::open(['action' => 'PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'About Product')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title and Price'])}}
           
        </div>

        <div class="form-group">
                {{Form::label('body', 'Product Description')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Product Description'])}}
               
        </div>

        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>

        <hr>

        {{Form::submit('Add Product', ['class' => 'btn btn-primary float-right'])}}
    {!! Form::close() !!}

@endsection