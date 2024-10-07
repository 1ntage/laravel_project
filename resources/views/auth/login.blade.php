<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<div class="login_block">
<form action="{{ route('login') }}" method="POST" class="auth_form">
    @csrf
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="auth_input" required>

    <label for="password">Пароль</label>
    <input type="password" name="password" id="password" class="auth_input" required>

    <button type="submit">Войти</button>

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
</div>
</body>
</html>
