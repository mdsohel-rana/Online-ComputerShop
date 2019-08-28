@extends('layouts.app')

@section('content')
<br>

    <h1>All Products</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="card">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                </div>
                <div class="col-md-8 col-sm-8">
                        <div class="card-body">
                                <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                                <small>Seller-- {{$post->created_at}} || By- {{$post->user->name}}</small>
                        </div>
                </div>
            </div>
            
        </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Products Found</p>

    @endif

@endsection