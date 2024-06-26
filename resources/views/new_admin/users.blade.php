@extends('new_admin.layout.admin')
@section('content')
    <div class="d-flex">
        <h2>Пользователи сайта</h2>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Номер пользователя</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Логин</th>
            <th>Почта</th>
            <th>Роль</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->surname}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->login}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->role}}</td>
                <td>
                    <a href="{{route('admin.users.edit', $item)}}">Изменить</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
