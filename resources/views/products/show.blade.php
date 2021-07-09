@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container-product">
        <img style="margin-left: 5%;" class="objectImage" src="/img/products/{{ $products->image}}">
        <div style="margin-left: 5%;">
            <h3>{{$products->name}}</h3>
            <div style="display: flex; flex-direction: row; align-items: center;">
                <h3>R$ {{$products->price}}</h3>
            </div>
            <div style="display: flex; flex-direction: row; align-items: center; color: #dc3545;">
                <ion-icon size="large" name="stopwatch-outline"></ion-icon>
                <h4 style="margin-top: 10px;">{{$products->minutes}}m</h4>
            </div>
            <p style="margin-right: 5%;">{{$products->description}}</p>
            <div style="background-color: #DCDCDC; margin-right: 10%; border-radius: 1%; margin-bottom: 2%;">
                <div style="padding: 2%; border-radius: 120px; height: 110px;">
                    <p style="font-style: italic;">
                        "Se você foca apenas naquilo que deixou para trás, jamais conseguirá ver o que tem pela frente."
                    </p>
                    <p style="font-style: italic;">
                    - Ratatouille.
                    </p>
                </div>
            </div>
            <a style="width: 20%; display: flex; flex-direction: row; align-items: center; justify-content: space-around; border-radius: 10px;" href="#" class="btn btn-danger">
                <ion-icon size="large" name="cart-outline"></ion-icon> Comprar
            </a>
        </div>
    </div>
</div>
@endsection
