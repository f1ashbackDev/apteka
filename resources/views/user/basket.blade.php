@extends('layouts.header')
@section('content')
    <div class="container">
        <ul class="breadcump">
            <li>
                <a href="{{ route('index') }}" class="breadcump-link">Главная</a>
            </li>
            <li>
                >
            </li>
            <li>
                <a class="breadcump-link-active">Корзина</a>
            </li>
        </ul>
        <section class= "basket">
            <h2>Корзина</h2>
            <div class="basket-body">
                @if(count($basket) > 0)
                    <div class="row-baskets">
                        @foreach($basket as $item)
                            @foreach($item->product as $product)
                                <div class="card-basket">
                                    <div class="card-bakset-header">
                                        @foreach($product->image as $image)
                                            <img src="{{ asset('/storage/' . $image->image) }}" alt="" width="80px" height="72px">
                                        @endforeach
                                    </div>
                                    <div class="card-basket-body">
                                        <h3 class="card-product">{{ $product->name }}</h3>
                                        <p class="card-price"><strong>{{ $product->price }}</strong> за шт.</p>
                                    </div>
                                    <div class="card-basket-input">
                                        <div class="basket-form">
                                            <button class="basket-button" onclick="downSizeProductInput({{ $product->id }})">-</button>
                                            <input type="number" placeholder="{{ $item->count }}" value="{{ $item->count }}" class="basket-input-count" id="product-input-{{$product->id}}">
                                            <button class="basket-button" onclick="addProductInput({{ $product->id }})">+</button>
                                        </div>
                                    </div>
                                    <div class="card-basket-footer">
                                        <h3 class="card-total-price" id="product-id-{{$product->id}}"><span id="card-total-price">{{ $item->product_sum }}</span> Руб</h3>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    <div class="basket-info">
                        <div class="basket-info-row-1">
                            <p class="basket-info-count">{{ count($basket) }} товара</p>
                            <p class="basket-info-total" id="totalPrice">0 Р</p>
                        </div>
                        <div class="basket-info-result">
                            <p class="basket-info-text">Итог</p>
                            <p class="basket-info-total-price" id="totalPrice">250,09 Р</p>
                        </div>
                        <a class="basket-info-add" href="{{ route('order.store') }}">Оформить заказ</a>
                    </div>
                @else
                    <p>Корзина пустая</p>
                @endif
            </div>
        </section>
    </div>
@endsection
