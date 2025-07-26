@extends('layouts.frontend')
@section('content')

    <section class="mb-5">
      <div class="container-fluid">
          <div class="hero__item set-bg" data-setbg="{{ asset('frontend/img/hero/banner.png') }}">
              <div class="hero__text">
                  <span>Cosmetic</span>
                  <h2> Your skin-care hub in one place</h2>
                  <p>Free Pickup and Delivery Available</p>
                  <a href="#" class="primary-btn">SHOP NOW</a>
              </div>
          </div>
      </div>
    </section>

    


    <section class="categories">
      <div class="container">
      <div class="section-title">
              <h2>Les Categories</h2>
            </div>
        <div class="row">
          <div class="categories__slider owl-carousel">
    

<div class="row justify-content-center g-4">
 
  @for($i = 1; $i <= 3; $i++)
     <div class=" d-flex justify-content-center">
      <div class="categories__item text-center">
        <h5>
          <a href="#">
            Accessoire {{ $i }}
          </a>
        </h5>

          @php 

      $v=  'hero/product3.png' ;
      $c='breadcrumb.jpg' ;
  @endphp
        
          <img src="{{ asset('frontend/img/'.$v) }}" 
             alt="Accessoire {{ $i }}" 
                         style="height: 300px; width: 100%; object-fit: cover; border: 1px solid #ddd;">

              
              <br>
      </div>
    </div>
  @endfor
</div>




          </div>
        </div>
      </div>
    </section>
    <!-- Categories Section End -->


    


<section class="featured spad">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-12 text-center">
        <div class="section-title">
          <h2>Featured Products</h2>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      @php $i = 2; @endphp

      @forelse ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex align-items-stretch justify-content-center">
          <div class="card text-center shadow-sm p-3 w-100">
            
            {{-- Image --}}
            <a href="{{ url('products') }}">
              <img src="{{ asset('frontend/img/hero/product' . $i . '.jpeg') }}"
                   alt="Image {{ $i }}"
                   class="card-img-top img-fluid mb-3"
                   style="max-height: 300px; object-fit: cover;">
            </a>

            {{-- Nom et prix --}}
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">${{ $product->price }}</h6>

              {{-- Bouton ADD TO CART / VIEW CART --}}
              
              @if(in_array($product->id, $productIdsInCart))
                <a href="{{ route('cart.index') }}" class="btn btn-success mt-2 w-100">
                  VIEW CART <i class="fa fa-eye"></i>
                </a>
              @else
                <form action="{{ route('cart.store') }}" method="POST" class="mt-2">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <button type="submit" class="btn btn-primary w-100">
                    ADD TO CART <i class="fa fa-shopping-cart"></i>
                  </button>
                </form>
              @endif
            </div>
          </div>
        </div>

        @php
          $i++;
          if ($i == 3) $i++;
          if ($i > 5) $i = 2;
        @endphp
      @empty
        <div class="col text-center">
          <div class="alert alert-warning">No Featured Products Available</div>
        </div>
      @endforelse
    </div>
  </div>
</section>





    <!-- Featured Section End -->
    <!-- information section -->

    <div class='owned'>
        <b>SMALL FAMILY OWNED BUSINESS</b>
        <div class="owned-cont">
        <div class='ownedp'>
          <p>"We created COSMITIK because we wanted truly effective, natural skincare that only uses the highest quality of ingredients and is made using the latest developments in technology and science.</p>
          <p> We started by sourcing some of the best ingredients from around the world.</p>
          <p> Then we developed our formulas using some of the most advanced technologies available.</p>
          <p> We don't just want our products to work—we want them to work better than anything else out there."</p>
          
        </div>
        <img src="{{ asset('frontend/img/hero/ow.jpeg') }}" alt='' class='ownedimg'/>
        </div>
      </div>

      <div class='avis'>
        <b>Join our family of 25,000+ happy customers</b>
        <img src="{{ asset('frontend/img/hero/avis.jpg') }}" alt='' class='avisimg'></img>
        <p>Since inception our goal has been to not only provide you with the most potent and highest quality natural skincare formulas, but also with worry-free and seamless online shopping experience.</p>
        <div class='ico00'>
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
          </svg>
          <p>Free Shipping For Orders over 500MAD</p>
        </div>
        <div class='ico00'>
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
          </svg>
          <p>30-day Happiness Gurantee</p>
        </div>
        <div class='ico00'>
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z"/>
          </svg>
          <p>Dermatologist Approved</p>
        </div>
      </div>

      <div class='labo'>
        <img src="{{ asset('frontend/img/hero/labo.jpeg') }}" alt='' class='laboimg'></img>
        <div class='labo1'>
          <b>Clinically Proven</b>
          <p>We don't compromise with effectiveness nor safety. Results after 12 weeks of use.</p>
          <div class='por'>
            <span>21%</span>
            <p>Reduction in Wrinkles Depth and Skin Roughness</p>
          </div>
          <div class='por'>
            <span>31%</span>
            <p>Increase in skin moisture</p>
          </div>
        </div>
      </div>

    <!-- End information section -->
    <!-- Banner Begin -->
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="banner__pic">
              <img src="{{ asset('frontend/img/breadcrumb.jpg') }}" alt="" />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="banner__pic">
              <img src="{{ asset('frontend/img/banner/banner-2.jpg') }}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>

         

    <!-- Banner End -->
@endsection
