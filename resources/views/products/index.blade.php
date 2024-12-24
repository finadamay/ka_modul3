@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{$product->image}}" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <h2>Rp {{$product->price}}</h2>
                            <p class="card-text">In Stock: {{$product->in_stock}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
