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
                <a href="{{ route('category') }}" class="breadcump-link">Каталог</a>
            </li>
            <li>
                >
            </li>
            <li>
                <a href="{{ route('category.show', $category) }}" class="breadcump-link">{{ $category->categories_name }}</a>
            </li>
            <li>
                >
            </li>
            <li>
                <a class="breadcump-link-active">{{ $product->name }}</a>
            </li>
        </ul>
        <div class="product">
            <h3>{{ $product->name }}</h3>
            <div class="product-header">
                <p>арт. 371431</p>
                <div class="product-reviews">
                    <p>3 отзыва</p>
                </div>
                <div class="product-add-favorites">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2046 4.25644C14.3299 3.13067 15.8564 2.49817 17.4482 2.49817C19.0399 2.49817 20.5664 3.13063 21.6916 4.25636C22.8174 5.38164 23.45 6.90829 23.45 8.49999C23.45 10.0917 22.8175 11.6183 21.6917 12.7435C21.6917 12.7436 21.6917 12.7435 21.6917 12.7435L12.8517 21.5835C12.6565 21.7788 12.3399 21.7788 12.1446 21.5835L3.30461 12.7435C0.960963 10.3999 0.960963 6.60009 3.30461 4.25644C5.64826 1.91279 9.44807 1.91279 11.7917 4.25644L12.4982 4.96289L13.2046 4.25644C13.2046 4.25641 13.2046 4.25647 13.2046 4.25644ZM17.4482 3.49817C16.1217 3.49817 14.8496 4.02528 13.9118 4.96346L12.8517 6.02355C12.758 6.11732 12.6308 6.16999 12.4982 6.16999C12.3656 6.16999 12.2384 6.11732 12.1446 6.02355L11.0846 4.96355C9.13149 3.01042 5.96484 3.01042 4.01172 4.96355C2.05859 6.91667 2.05859 10.0833 4.01172 12.0364L12.4982 20.5229L20.9846 12.0364C21.9228 11.0987 22.45 9.82648 22.45 8.49999C22.45 7.17351 21.9229 5.90138 20.9847 4.96363C20.0469 4.02544 18.7747 3.49817 17.4482 3.49817Z" fill="#414141"/>
                            </svg>
                        </span>
                    <p>Добавить в избранное</p>
                </div>
            </div>
            <div class="product-body">
                <div class="product-images">
                    @foreach($images as $image)
                        <img src="{{ asset('/storage/' . $image->image) }}" alt="" width="64px" height="86.4px">
                    @endforeach
                </div>
                <div class="product-image">
                    @foreach($images as $image)
                        <img src="{{ asset('/storage/' . $image->image) }}" alt="" width="504px" height="496px">
                    @endforeach
                </div>
                <div class="product-info">
                    <h4>{{ $product->price }} рублей</h4>
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <a class="product-add-basket" href="{{ route('basket.store', $product) }}">В Корзину</a>
                        @else
                            <a class="product-add-basket" href="{{ route('login') }}">Авторизуйтесь</a>
                        @endif
                    <p>Вы получаете 10 бонусов</p>
                    <div class="table">
                        <div class="row">
                            <p>Бренд</p>
                            <p>ПРОСТОКВАШИНО</p>
                        </div>
                        <div class="row">
                            <p>Страна произоводителя</p>
                            <p>Россия</p>
                        </div>
                        <div class="row">
                            <p>Вес</p>
                            <p>180г</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="other-products">
            <h3>С этим товром покупают</h3>
            <div class="cards">
                @foreach($products_all as $item)
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
                                Рейтинг товара
                            </div>
                            <div class="add_cart">
                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <a href="{{ route('basket.store', $item) }}">В корзину</a>
                                @else
                                    <p>Авторизуйтесь</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="reviews-block">
            <h3>Отзывы</h3>
            <div class="rows">
                @foreach($reviews as $item_reviews)
                    <div class="review">
                        <div class="review-header">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.33325 12.6666C2.33325 11.0098 3.6764 9.66663 5.33325 9.66663H10.6666C12.3234 9.66663 13.6666 11.0098 13.6666 12.6666V14C13.6666 14.1841 13.5173 14.3333 13.3333 14.3333C13.1492 14.3333 12.9999 14.1841 12.9999 14V12.6666C12.9999 11.378 11.9553 10.3333 10.6666 10.3333H5.33325C4.04459 10.3333 2.99992 11.378 2.99992 12.6666V14C2.99992 14.1841 2.85068 14.3333 2.66659 14.3333C2.48249 14.3333 2.33325 14.1841 2.33325 14V12.6666Z" fill="#414141"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5 4.66663C5 3.00977 6.34315 1.66663 8 1.66663C9.65685 1.66663 11 3.00977 11 4.66663C11 6.32348 9.65685 7.66663 8 7.66663C6.34315 7.66663 5 6.32348 5 4.66663ZM8 2.33329C6.71134 2.33329 5.66667 3.37796 5.66667 4.66663C5.66667 5.95529 6.71134 6.99996 8 6.99996C9.28866 6.99996 10.3333 5.95529 10.3333 4.66663C10.3333 3.37796 9.28866 2.33329 8 2.33329Z" fill="#414141"/>
                                </svg>
                            </span>
                            <h5>{{ $item_reviews->name }}</h5>
                        </div>
                        <div class="review-body">
                            <p>Оценка: {{ $item_reviews->count }}</p>
                            <p>{{ $item_reviews->text }}</p>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="send-review">
                    <form method="post" action="{{ route('review.create', $product->id) }}">
                        @csrf
                        <div>
                            <label>Ваше имя</label>
                            <input type="text" name="name" placeholder="Имя">
                        </div>
                        <div class="review-count">
                            <label for="review">Ваша оценка</label>
                            <input type="number" placeholder="1" name="count" class="form-count-rate">
                        </div>
                        <div class="review-text">
                            <input type="text" placeholder="Отзыв" class="form-text-review" name="text">
                        </div>
                        <input type="submit" value="Отправить отзыв" class="form-button">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
