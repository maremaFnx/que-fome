@extends('layouts.app')

@section('content')
<div class="product-container">
    <div class="card" style="width: 900px;">
        <div class="card-body" style="width: 900px;">
            <div class="row-items">
                <img class="card-image" style="width: 500px;" src="/img/products/{{ $products->image}}">
                <div class="column-info">
                    <h1>{{$products->name}}</h1>
                    <h2>R${{$products->price}}</h2>
                    <div style="color:#3490dc;" class="info-row">
                        <ion-icon name="stopwatch-outline"></ion-icon>
                        <h3 style="margin-top: 10px;">{{$products->minutes}}m</h3>
                    </div>
                    <div class="info-row">
                        <p style="margin-top: 10px;">{{$products->description}}</p>
                    </div>
                    @if(Auth::user()->type != 1)
                    <form action="/products/buy/{{$products->id}}" method="POST">
                        @csrf
                        <a href="/products/buy/{{$products->id}}"
                        class="btn btn-primary" id="event-submit"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                            Adicionar ao carrinho
                        </a>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
