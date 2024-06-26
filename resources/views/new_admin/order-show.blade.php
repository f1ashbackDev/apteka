@extends('new_admin.layout.admin')
@section('content')
    <div class="d-flex">
        <h2>Заказ №{{$orders->id}}</h2>
    </div>

    <form action="{{ route('admin.orders.update', $orders) }}" method="post">
        @csrf
        <label>
            Статус заказа:
            <select name="status">
                <option value="Создан" @selected($orders->status == 'Создан')>Создан</option>
                <option value="Обработка" @selected($orders->status == 'Обработка')>Обработка</option>
                <option value="Отправка" @selected($orders->status == 'Отправка')>Отправка</option>
                <option value="Доставлен" @selected($orders->status == 'Доставлен')>Доставлен</option>
            </select>
        </label>
        <input type="submit" value="Сохранить">
    </form>

    <table class="table">
        <thead>
        <tr>
            <th>Название продукта</th>
            <th>Цена товара</th>
            <th>Количество товара</th>
            <th>Сумма</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orderItem as $item)
            @foreach($item->product as $product)
                <tr>
                    <td>
                        <a href="#">{{$product->name}}</a>
                    </td>
                    <td>{{$product->price}}</td>
                    <td>{{$item->count}}</td>
                    <td>{{$item->sum}}</td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
@endsection
