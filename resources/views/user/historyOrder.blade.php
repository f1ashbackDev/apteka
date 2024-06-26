@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="m-5">
            <h2>Заказ №{{ $order->id }}</h2>
            <p>Статус заказа:  {{ $order->status }}</p>
            <p id="totalAmount"></p>
            <table class="table">
                <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование товара </th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Стоимость</th>
                </tr>
                </thead>
                <tbody>
                @foreach($history as $item)
                    @foreach($item->product as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('/storage/' . $item->image[0]->image) }}" style="width: 119px;
                        height: 67px"/>
                            </td>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                {{ $product->price }}
                            </td>
                            <td>
                                {{ $item->count }}
                            </td>
                            <td class="product">{{ $item->sum }}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js-scripts')
    <script>
        let total = 0;
        let textTotal = document.getElementById('totalAmount');
        const totalAmount = () =>{
            [...document.getElementsByClassName('product')].forEach(item => {
                total += parseInt(item.textContent)
            })
            textTotal.innerText = 'Общая сумма заказа: ' + total;
        }
        document.addEventListener("DOMContentLoaded", function () {
            totalAmount();
        })
    </script>
@endsection
