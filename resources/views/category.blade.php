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
                <a href="" class="breadcump-link-active">Каталог</a>
            </li>
        </ul>
        <section class="catalog">
            <h2>Каталог</h2>
            <div class="columns">
                @foreach($category as $item)
                    <div class="col">
                        <a href="{{ route('category.show', $item) }}">
                            <img src="{{  asset('/storage/'. $item->image) }}" alt="">
                            <div></div>
                            <h3>{{ $item->categories_name }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
