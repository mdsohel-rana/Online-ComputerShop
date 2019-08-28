@extends('layouts.app')


@section('content')
    <h1>{{$title}}</h1>
    @if(count($services) > 0)
        <ul style="text-align:center" class="list-group">
            @foreach($services as $service)
                <li class="list-group-item"><a href="/posts">{{$service}}</a></li>
            @endforeach
                <li  class="list-group-item">
                    <form style="margin-left:16rem"  class="form-inline my-2 my-lg-0" role="search" method="get" action="{{route("findcat")}}">
                        <button name="button" value="Asus" class="btn btn-primary my-2 my-sm-0" type="submit">Asus Product</button>
                        <br>
                        <button name="button" value="Dell" class="btn btn-primary my-2 my-sm-0" type="submit">Dell Product</button>
                        <br>
                        <button name="button" value="Hp" class="btn btn-primary my-2 my-sm-0" type="submit">Hp Product</button>
                        <br>
                        <button name="button" value="Acer" class="btn btn-primary my-2 my-sm-0" type="submit">Acer Product</button>
                        <br>
                        <button name="button" value="LG" class="btn btn-primary my-2 my-sm-0" type="submit">LG Product</button>

                    </form>
                </li>
                
                
                
        </ul>

    @endif
    
@endsection
