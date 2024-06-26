@extends('new_admin.layout.admin')
@section('content')
    <h2>Изменение пользователя:</h2>
    <form action="{{ route('admin.users.update', $user) }}" method="post">
        @csrf
        <p>Фамилия: {{$user->surname}}</p>
        <p>Имя: {{$user->name}}</p>
        <p>Логин: {{$user->login}}</p>
        <p>Почта: {{$user->email}}</p>
        <p>Роль: </p>
        <select name="role">
            <option value="Пользователь" @selected($user->role == 'Пользователь')>Пользователь</option>
            <option value="Менеджер" @selected($user->role == 'Менеджер')>Менеджер</option>
            <option value="Администратор" @selected($user->role == 'Администратор')>Администратор</option>
        </select>
        <input type="submit" value="Сохранить"/>
    </form>
@endsection
