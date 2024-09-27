<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
</head>
<body>
<h1>{{ $product->name }}</h1>
<p>Цена: {{ $product->cost }} руб.</p>
<p>Доступное количество: {{ $product->amount }}</p>

<h2>Оформление заказа</h2>
<form action="{{ route('order.store', $product->id) }}" method="POST">
    @csrf
    <label for="quantity">Количество:</label>
    <input type="number" name="quantity" id="quantity" min="1" max="{{ $product->amount }}" required>

    <button type="submit">Заказать</button>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
