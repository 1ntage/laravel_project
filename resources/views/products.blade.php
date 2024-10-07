<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="products-container">
    @foreach ($products as $product)
        <div class="product-card {{ $product->amount == 0 ? 'out-of-stock' : 'in-stock' }}">
            <h3><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h3>
            <p>Цена: {{ $product->cost }} руб.</p>
            <p>{{ $product->amount > 0 ? 'Количество: ' . $product->amount : 'Нет в наличии' }}</p>
        </div>
    @endforeach
</div>
<a href="{{ route('myOrders')}}">Мои заказы</a>
<form action="{{ route('logout') }}" method="get">
    <button type="submit">
        Выйти
    </button>
</form>
</body>
</html>
