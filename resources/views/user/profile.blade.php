@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
    <div class="card-header">{{ __('Seu perfil') }}</div>
        <div class="card-body">
            <div style="display: flex; align-items: center;">
                <ion-icon name="person-outline"></ion-icon>
                <h2 style="margin-top: 0.5%; margin-left: 1%;" >{{Auth::user()->name}}</h2>
            </div>
            <div style="display: flex; align-items: center;">
                <ion-icon name="mail-outline"></ion-icon>
                <h2 style="margin-top: 0.5%; margin-left: 1%;" >{{Auth::user()->email}}</h2>
            </div>
            <div class="link-row">
                <a style="margin: 4px;" href="/profile/edit/{{Auth::user()->id}}" class="btn btn-primary">
                    <ion-icon name="create-outline"></ion-icon>
                </a>
                <form action="/profile/{{ Auth::user()->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button id="btn_destroy" onclick="return confirm('Tem certeza que deseja deletar sua conta?');" type="submit" class="btn btn-primary">
                        <ion-icon name="trash-outline"></ion-icon>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
