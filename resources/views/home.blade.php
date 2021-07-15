@extends('layouts.app')

@section('content')
@if(Auth::user()->type != 1)
<div class="container">
    <div class="search-bar">
        <div>
            @if($search)
            <h4>Você buscou por: {{$search}}.</h4>
            @else
            <h4 style="color: #fff; text-shadow: #000;">Busque por um lanche:</h4>
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
                    <a type="button" href="/products/{{$products->id}}" class="btn btn-primary">Conferir</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<div class="container">
    <div class="search-bar">
        <div>
            @if($search)
            <h4 style="color: #fff; text-shadow: #000;">Você buscou por: {{$search}}.</h4>
            @else
            <h4 style="color: #fff; text-shadow: #000;">Busque por um lanche:</h4>
            @endif
            <form style="margin-bottom: 5%;" action="/" method="GET">
                <input type="text" class="form-control" id="search" name="search" placeholder="Ex: X-Iggor." aria-describedby="basic-addon1">
            </form>
        </div>
    </div>
    <div>
    </div>
    @if(count($products))
    <h4 style="color: #fff; text-shadow: #000;">Produtos cadastrados no sistema:</h4>
    @else
    <h4 style="color: #fff; text-shadow: #000;">Nenhum lanche econtrado.</h4>
    @endif

    <div class="row row-cols-1 row-cols-md-3">
        @foreach($products as $products)
        <div class="col mb-4">
            <div class="card" style="width: 14.5rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$products->name}}</h5>
                    <div style="display: flex; align-items: center; justify-content: left;">
                        <a style="margin: 4px;" href="/products/edit/{{$products->id}}" class="btn btn-primary">
                            <ion-icon name="create-outline"></ion-icon>
                        </a>
                        <a style="margin: 4px;" href="/products/{{$products->id}}" class="btn btn-primary">
                            <ion-icon name="eye-outline"></ion-icon>
                        </a>
                        <form action="/products/{{ $products->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="btn_destroy" onclick="return confirm('Tem certeza que deseja remover?');" type="submit" class="btn btn-primary">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection
