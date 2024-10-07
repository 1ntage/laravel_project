<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<form action="{{ route('register') }}" method="POST" class="auth_form">
    @csrf

    <label for="name">Имя</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="auth_input">

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="auth_input">

    <label for="password">Пароль</label>
    <input type="password" name="password" id="password" required class="auth_input">

    <label for="password_confirmation">Подтвердите пароль</label>
    <input type="password" name="password_confirmation" id="password_confirmation" required class="auth_input">

    <button type="submit">Зарегистрироваться</button>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
</body>
</html>
