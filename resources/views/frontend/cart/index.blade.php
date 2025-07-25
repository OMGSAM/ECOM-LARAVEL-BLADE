@extends('layouts.checkout')

@section('content')

 

<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping  Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Shopping Cart</span>
                                            <a href="{{url('order/checkout')}}"> CHECKOUT </a>

                    </div>

                    <section class="checkout spad">
                                   <div class="breadcrumb__option">         <a href="{{url('order/checkout')}}"> GO TO CHECK OUT </a></div>

<div class="container" id="cart" style="background: white; color: black; border: 2px solid red; padding: 20px;">

        @if($cartItems->isEmpty())
            <p>Votre panier est vide.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom du produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
                          <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                             <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 2) }} MAD</td>
                            <td>{{ number_format($item->getPriceSum(), 2) }} MAD

                             
                            </td>
                             <td>
                                <form  method="post" action="{{route('cart.destroy' , $item->id)}}">
                                    @csrf 
                                    @method('delete')
                                    <input type="submit" value="remove">
                                </form>
                             </td>
                        </tr>
                    @endforeach
                    <tr>
                     
            
                        <td colspan="3"><strong>Total</strong></td>
                        <td><strong>{{ number_format(\Cart::getTotal(), 2) }} MAD</strong></td>
                    </tr>
                 </tbody>
                 
            </table>

             
        @endif

    </div>
</section>


                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
<div class="container" id="cart" style="background: white; color: black; border: 2px solid red; padding: 20px;">

        @if($cartItems->isEmpty())
            <p>Votre panier est vide.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom du produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 2) }} MAD</td>
                            <td>{{ number_format($item->getPriceSum(), 2) }} MAD</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td><strong>{{ number_format(\Cart::getTotal(), 2) }} MAD</strong></td>
                    </tr>
                </tbody>
            </table>
        @endif

    </div>
</section>

@endsection
