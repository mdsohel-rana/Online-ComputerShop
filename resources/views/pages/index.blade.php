@extends('layouts.app')


@section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <h3> Online Computer Shop </h3>
        <p>You can buy computer and accessoris with very Low price</p>
        <hr>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register">Add Admin</a></p>
        <h3>Some Featured Products</h3>
        <hr>
        <div  class=" text-center">
                <div><h5>LG Monitor</h5></div>
                <img style="width:50%; height:50%" src="/storage/cover_images/648_1566152667.jpg" class="rounded" alt="...">
        </div>
        <hr>
        <div  class=" text-center">
                <div><h5>Dell Monitor</h5></div>
                <img style="width:50%; height:50%" src="/storage/cover_images/648_1566152667.jpg" class="rounded" alt="...">
        </div>
        <hr>
        <div  class=" text-center">
                <div><h5>acer Monitor</h5></div>
                <img style="width:50%; height:50%" src="/storage/cover_images/648_1566152667.jpg" class="rounded" alt="...">
        </div>
        <hr>
        <div  class=" text-center">
                <div><h5>asus Monitor</h5></div>
                <img style="width:50%; height:50%" src="/storage/cover_images/648_1566152667.jpg" class="rounded" alt="...">
        </div>
        <hr>
    </div>
@endsection
