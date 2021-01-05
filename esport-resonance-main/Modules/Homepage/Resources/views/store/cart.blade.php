@extends('homepage::layout')

@section('content')
<!--BREADCRUMBS BEGIN-->
<section class="image-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="info">
                    <div class="wrap">
                        <ul class="breadcrumbs">
                            <li><a href="{{ route('home')}}">Main</a>/</li>
                            <li>Store</li>
                        </ul>
                        <h1>Your Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--BREADCRUMBS END-->

<!--CART WRAP BEGIN-->
<section class="cart-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Your shopping Cart</h4>
            </div>
            <div class="col">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12 overflow-scroll">

                <table class="cart-table">
                    <tr>
                        <th></th>
                        <th class="product">Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th class="total">Total</th>
                    </tr>
                    <?php $total = 0; ?>
                    <form action="{{ route('cart_update') }}" method="post">@csrf
                    @foreach($carts as $c)
                    <input type="hidden" name="id[]" value="{{ $c->id }}">
                    <?php $total += $c->harga_total; ?>
                    <tr>
                        <td class="delete"><a href="{{ route('cart_hapus', $c->id)}}" onclick="return confirm('Anda yakin ingin menghapus item ini?')"><i class="fa fa-close" aria-hidden="true"></i></a></td>
                        <td class="name"><img class="product-image" src="{{ asset('storage/'. $c->product->thumbnail) }}" alt="cart-product" height="75">{{ $c->product->name }} / {{ $c->warna }} / {{ $c->ukuran }}</td>
                        <td class="cost">Rp{{ number_format($c->harga_satuan, 0, ',', '.') }}</td>
                        <td class="quantity"><input type="number" name="qty[]" value="{{ $c->jumlah }}"></td>
                        <td class="total">Rp{{ number_format($c->harga_total, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="name text-right">Total</td>
                        <td class="total">Rp{{ number_format($total, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <div class="update-wrap">
                    <button class="btn update" type="submit">update cart</button>
                    </form>
                    <a href="{{ route('checkout') }}" class="btn checkout">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--CART WRAP END-->

@endsection
