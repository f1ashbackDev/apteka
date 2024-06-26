@extends('new_admin.layout.admin')
@section('content')
    <div class="d-flex">
        <h2>Отзывы пользователей</h2>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Название продукта</th>
            <th>Имя</th>
            <th>Оценка</th>
            <th>Текст</th>
        </tr>
        </thead>
        <tbody>
            @foreach($reviews as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->count }}</td>
                    <td>{{ $item->text }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
