@extends('layouts.main')

@section('content')
<div class="container-form" style="margin-top: 2.5%;">
    <h1 style="color: #ffff;">Cadastre o produto:</h1>
    <form style="margin-bottom: 5%;" action="/products" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome</span>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ex: X-Iggor." aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Preço</span>
            <input type="number" class="form-control" step="0.5" id="price" name="price" min="1" max="100">
            <span class="input-group-text" id="basic-addon1">R$.</span>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Minutos</span>
            <input type="number" class="form-control" id="minutes" name="minutes" min="10" max="60">
            <span class="input-group-text" id="basic-addon1">Min.</span>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Descrição</span>
            <textarea class="form-control" aria-label="With textarea" id="description" name="description" placeholder="Ex: Pão com gergelin, 4 ovos..."></textarea>
        </div>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Disponível?</span>
            <select id="avaliable" name="avaliable" class="form-control">
                <option value="0" selected>Não.</option>
                <option value="1" selected>Sim.</option>
            </select>
        </div>


        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Foto do produto</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <input type="hidden" name="sales" id="sales" value="0" >
        <input class="btn btn-danger" type="submit" value="Cadastrar produto">
        <a type="button" href="/" class="btn btn-danger">Voltar</a>
    </form>

</div>
@endsection
