@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Seu carrinho') }}</div>
        <div class="card-body">
           @foreach($productAsCustomer as $productAsCustomer)
            <div class="cart-row">
                <h4 class="card-title">{{$productAsCustomer->name}}</h4>
                <h4 class="card-title">R${{$productAsCustomer->price}}</h4>
                <h4 class="card-title">{{$productAsCustomer->minutes}}m</h4>
                <form action="/products/giveback/{{$productAsCustomer->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="btn_destroy"  style="margin-bottom: 2.5%;" onclick="return confirm('Tem certeza que deseja remover?');" type="submit" class="btn btn-primary">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </form>
            </div>
            @endforeach
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" href="/pdf">
            Finalizar compras
            </a>
        </div>
    </div>
    
</div>

@endsection
