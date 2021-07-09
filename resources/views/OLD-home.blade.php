@extends('layouts.main')

@section('content')

<div class="container">
    <div class="search-bar">
        <div>
            @if($search)
            <h4>Você buscou por: {{$search}}.</h4>
            @else
            <h4>Busque por um lanche:</h4>
            @endif
            <form style="margin-bottom: 5%;" action="/" method="GET">
                <input type="text" class="form-control" id="search" name="search" placeholder="Ex: X-Iggor." aria-describedby="basic-addon1">
            </form>
        </div>
    </div>
    <div>
    </div>
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($products as $products)
        <div class="col mb-4">
            <div class="card" id="card-body">
                <img src="/img/products/{{$products->image}}" id="img-dm" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$products->name}}</h5>
                    <div class="card-text" id="card-text">
                        <p>{{$products->description}}</p>
                    </div>
                    <a type="button" style="margin-top: 5%; border-radius: 10px;" href="/products/{{$products->id}}" class="btn btn-danger">Conferir</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
