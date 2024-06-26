@extends('layouts.header')
@section('content')
    <div style="background-color: white; min-height: calc(100vh - 186px ); width: 470px; margin: 0 auto; margin-bottom: 30px">
        <a href="{{ route('index') }}" style="float: right; margin-right: 8px; margin-top: 12px">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
            </svg>
        </a>
        <div style="padding: 30px 50px; margin: 0; text-align: center;">
            <h3 style="font-size: 18px;color: #969696">Регистрация</h3>
        </div>
        <div style="padding: 12px 50px; margin: 0">
            <form action="{{ route('register') }}" method="post" style="display: flex; flex-direction: column">
                @csrf
                <label for="surname" style="color: #989898; margin-bottom: 8px; font-weight: 400; line-height: normal; display: inline-block">Фамилия</label>
                <input type="text" name="surname" id="surname" style="background-color: #f7f7f7; margin-bottom: 24px; padding: 0 12px; height: 40px"/>

                <label for="name" style="color: #989898; margin-bottom: 8px; font-weight: 400; line-height: normal; display: inline-block">Имя</label>
                <input type="text" name="name" id="name" style="background-color: #f7f7f7; margin-bottom: 24px; padding: 0 12px; height: 40px"/>

                <label for="login" style="color: #989898; margin-bottom: 8px; font-weight: 400; line-height: normal; display: inline-block">Логин</label>
                <input type="text" name="login" id="login" style="background-color: #f7f7f7; margin-bottom: 24px; padding: 0 12px; height: 40px"/>

                <label for="email" style="color: #989898; margin-bottom: 8px; font-weight: 400; line-height: normal; display: inline-block">Почта</label>
                <input type="email" name="email" id="email" style="background-color: #f7f7f7; margin-bottom: 24px; padding: 0 12px; height: 40px"/>

                <label for="password" style="color: #989898; margin-bottom: 8px; font-weight: 400; line-height: normal; display: inline-block">Пароль</label>
                <input type="password" name="password" id="password" style="background-color: #f7f7f7; margin-bottom: 24px; padding: 0 12px; height: 40px"/>

                <label for="retryPassword" style="color: #989898; margin-bottom: 8px; font-weight: 400; line-height: normal; display: inline-block">Повторите пароль</label>
                <input type="password" name="password_confirmation" id="retryPassword" style="background-color: #f7f7f7; margin-bottom: 24px; padding: 0 12px; height: 40px"/>

                <input type="submit" style="margin-top: 24px; background-color: #0a58ca; color: #fff; padding: 12px 0" placeholder="Зарегистрироваться"/>

                @if(count($errors) > 0)
                    <div class="errors" style="margin-top: 20px">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
        <div style="text-align: center; padding: 12px 50px; margin: 0">
            <p>Уже зарегистрированы?
                <a href="{{ route('loginView') }}" class="text-decoration-none" style="color: #0a53be">Войти</a>
            </p>
        </div>
    </div>
@endsection
