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
                <a class="breadcump-link-active">Поиск по сайту</a>
            </li>
        </ul>
        <section>
            <h2>Результаты поиска по: {{ $name_find }}</h2>
            @if(count($products) > 0)
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
                                    Рейтинг товара
                                </div>
                                <div class="add_cart">
                                    <a href="{{ route('basket.store', $item) }}">В корзину</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Товары не найдены</p>
            @endif
{{--            <div class="d-flex justify-content-center align-items-center mt-3">--}}
{{--                <ul class="pagination">--}}
{{--                    {{$products->links()}}--}}
{{--                </ul>--}}
{{--            </div>--}}
        </section>
    </div>
@endsection
