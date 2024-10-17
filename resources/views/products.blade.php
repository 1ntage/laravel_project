@extends('layouts.app')

@section('title', 'Продукты')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<div class="products-container">
    @foreach ($products as $product)
        <div class="product-card {{ $product->amount == 0 ? 'out-of-stock' : 'in-stock' }}">
            <h3><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h3>
            <p>Цена: {{ $product->cost }} руб.</p>
            <p>{{ $product->amount > 0 ? 'Количество: ' . $product->amount : 'Нет в наличии' }}</p>
        </div>
    @endforeach
</div>
<a href="/my-orders">Мои заказы</a>
<form action="{{ route('logout') }}" method="get">
    <button type="submit">
        Выйти
    </button>
</form>
@endsection
