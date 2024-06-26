@extends('layouts.header')
@section('content')
    <div class="container">
        <section>
            <div class="section-header">
                <h2>Товары дня</h2>
                <a href="{{ route('products') }}">Все товары</a>
            </div>
            <div class="cards">
                @foreach($products as $item)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('products.show', $item) }}">
                                <img src="{{ asset('/storage/'. $item->image[0]->image) }}" alt="">
                            </a>
                        </div>
                        <div class="card-footer">
                            <div class="price">
                                <a href="{{ route('products.show', $item) }}">
                                    <p>{{ $item->price }}</p>
                                </a>
                            </div>
                            <div class="name">
                                <a href="{{ route('products.show', $item) }}">
                                    <p>{{ $item->name }}</p>
                                </a>
                            </div>
                            <div class="related">
                                <a href="{{ route('favorite.store', $item->id) }}">Добавить в избранное</a>
                            </div>
                            <div class="add_cart">
                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <a href="{{ route('basket.store', $item) }}">В корзину</a>
                                @else
                                    <a href="{{ route('login') }}">Авторизуйтесь</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section>
            <h2>Хиты продаж</h2>
            <div class="cards">
                @foreach($products as $item)
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ asset('/storage/'. $item->image[0]->image) }}" alt="">
                        </div>
                        <div class="card-footer">
                            <div class="price">
                                <p>{{ $item->price }}</p>
                            </div>
                            <div class="name">
                                <p>{{ $item->name }}</p>
                            </div>
                            <div class="related">
                                <a href="">Добавить в избранное</a>
                            </div>
                            <div class="add_cart">
                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <a href="{{ route('basket.store', $item) }}">В корзину</a>
                                @else
                                    <a href="{{ route('login') }}">Авторизуйтесь</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
