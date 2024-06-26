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
                <a class="breadcump-link-active">{{ $category_name }}</a>
            </li>
        </ul>
        <section>
            <h2>{{ $category_name }}</h2>
            <div class="category_cards">
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
            <div class="d-flex justify-content-center align-items-center mt-3">
                <ul class="pagination">
                    {{$products->links()}}
                </ul>
            </div>
        </section>
    </div>
@endsection
