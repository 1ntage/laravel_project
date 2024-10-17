<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои заказы</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<h1>Мои заказы</h1>

<ul>
    @foreach ($orders as $order)
        <li>
            Товар: {{ $order->product->name }} | Количество: {{ $order->quantity }} | Сумма: {{ $order->total_cost }} руб. | Статус: {{ $order->status }}
        </li>
    @endforeach
</ul>
</body>
</html>
