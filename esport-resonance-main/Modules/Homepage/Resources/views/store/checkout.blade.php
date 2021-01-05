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
                        <h1>Checkout</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--BREADCRUMBS END-->


<!--CHECKOUT WRAP BEGIN-->
<section class="checkout-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h4>Billing Details</h4>
                <div class="customer-info">
                    <form action="{{ route('checkout_store') }}" method="POST"> @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="item">
                                    <label>
                                        <span>First Name <i>*</i></span>
                                        <input type="text" name="first_name" class="error" required>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item">
                                    <label>
                                        <span>Last Name <i>*</i></span>
                                        <input type="text" name="last_name" class="error" required>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="item">
                                    <label>
                                        <span>Company Name</span>
                                        <input type="text" name="company_name">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item">
                                    <label>
                                        <span>Email Address <i>*</i></span>
                                        <input type="text" name="email" class="error" required>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item">
                                    <label>
                                        <span>Phone <i>*</i></span>
                                        <input type="text" name="phone" class="error" required>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="item">
                                    <label>
                                        <span>Country <i>*</i></span>
                                        <select class="basic" name="country">
                                            <option>Indonesia</option>
                                            <option>Other</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="item">
                                    <label>
                                        <span>Address</span>
                                        <input type="text" placeholder="Street address" name="address">
                                    </label>
                                    <input type="text" placeholder="Apartment, suite, unit etc. (optional)" name="address">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="item">
                                    <label>
                                        <span>Town / City <i>*</i></span>
                                        <input type="text" name="city" class="error" required>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item">
                                    <label>
                                        <span>Postcode <i>*</i></span>
                                        <input class="error" type="text" name="zip" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                </div>
                <h4>Additional information</h4>
                <div class="customer-info">
                    <div class="item">
                        <label>
                            <span>Order notes <i>*</i></span>
                            <textarea placeholder="Notes about your order, e.g. special notes for delivery" class="error" required name="note"></textarea>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h4>Your order</h4>
                <table class="cart-table">
                    <tbody><tr>
                            <th class="product">Product</th>
                            <th class="total">Total</th>
                        </tr>
                        <?php $total = 0; ?>
                        @foreach($carts as $c)
                        <?php $total += $c->harga_total; ?>
                        <tr>
                            <td><strong>{{ $c->product->name }} / {{ $c->warna }} / {{ $c->ukuran }}</strong></td>
                            <td class="total">Rp{{ number_format($c->harga_total, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="total">Rp{{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody></table>
                <div class="cart-total">
                    <div class="delivery-list">
                        <button class="proceed" type="submit">Place order<i class="fa fa-check" aria-hidden="true"></i></button></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--CHECKOUT WRAP END-->

@endsection
