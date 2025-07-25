@extends('layouts.frontend')

@section('content')

<!-- Breadcrumb Section -->
<section data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout Section -->
<section>
    <div class="container" >
        <div>
            <h4>Billing Details</h4>

            <form method="POST" action="{{ route('checkout') }}">
                @csrf

                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <!-- Nom complet -->
                        <div class="checkout__input">
                            <p>Nom complet<span>*</span></p>
                            <input type="text" name="full_name" required>
                        </div>

                        <!-- Adresse -->
                        <div class="checkout__input">
                            <p>Adresse<span>*</span></p>
                            <input type="text" name="address" class="checkout__input__add" required>
                        </div>

                        <!-- Ville -->
                        <div class="checkout__input">
                            <p>Ville<span>*</span></p>
                            <input type="text" name="city" required>
                        </div>

                        <!-- Téléphone -->
                        <div class="checkout__input">
                            <p>Téléphone<span>*</span></p>
                            <input type="text" name="phone" required>
                        </div>

                        <!-- Email -->
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="email" name="email" required>
                        </div>

                        <!-- Notes -->
                        <div class="checkout__input">
                            <p>Notes (optionnel)</p>
                            <textarea name="notes" rows="3" style="width: 100%"></textarea>
                        </div>
                    </div>

                    <!-- Résumé de commande -->
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Votre commande</h4>
                            <div class="checkout__order__products">Produit <span>Total</span></div>

                            @php $cartItems = \Cart::getContent(); @endphp

                            @foreach ($cartItems as $item)
                                <div class="checkout__order__item">
                                    {{ $item->name }} x {{ $item->quantity }}
                                    <span>{{ number_format($item->getPriceSum(), 2) }} MAD</span>
                                </div>
                            @endforeach

                            <div class="checkout__order__total">Total <span>{{ number_format(\Cart::getTotal(), 2) }} MAD</span></div>

                            <button type="submit" class="site-btn btn-block">  Order Now</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

@endsection
