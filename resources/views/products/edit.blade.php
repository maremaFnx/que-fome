@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editando produto') }}</div>
                <div class="card-body">
                    <form action="/products/update/{{$products->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input required id="name" type="text" class="form-control" value="{{$products->name}}" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <textarea required type="text" class="form-control" id="description" name="description" rows="3">{{$products->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Minutos') }}</label>
                            <div class="col-md-6">
                                <input required id="minutes" type="number" class="form-control" name="minutes" value="{{$products->minutes}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Preço') }}</label>
                            <div class="col-md-6">
                                <input required id="price" type="number" class="form-control" value="{{$products->price}}" name="price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
                            <img style="width: 100px; margin-left: 15px;" src="/img/products/{{$products->image}}" alt="">
                            <div>
                                <input type="file" class="col-md-6" id="image" name="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Disponível') }}</label>
                            <select required class="form-select" name="avaliable">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Atualizar produto') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
