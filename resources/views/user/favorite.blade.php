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
                <a class="breadcump-link-active">Избранное</a>
            </li>
        </ul>
        <section>
            <h2>Избранное</h2>
            <div class="category_cards">
                @foreach($favorite as $item)
                    @foreach($item->product as $product)
                        <div class="card">
                            <div class="card-header">
                                @foreach($item->productImage as $image)
                                    <img src="{{ asset('/storage/'. $image->image) }}" alt="">
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <div class="price">
                                    <p>{{ $product->price }}</p>
                                </div>
                                <div class="name">
                                    <p>{{ $product->name }}</p>
                                </div>
                                <div class="related">
                                    <a href="">Добавить в избранное</a>
                                </div>
                                <div class="add_cart">
                                    @if(\Illuminate\Support\Facades\Auth::user())
                                        <a href="{{ route('basket.store', $product) }}">В корзину</a>
                                    @else
                                        <a href="{{ route('login') }}">Авторизуйтесь</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </section>
    </div>
@endsection
