<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>COSMETIC</title>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap"
      rel="stylesheet"
    />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>

  <body>
    @if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Succès',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK'
    });
</script>
@endif

    
     
    <!-- Page Preloder -->
    <div id="preloder">
      <div class="loader">
      </div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay">

    
    </div>
    <div class="humberger__menu__wrapper">
      <div class="humberger__menu__logo">
        <a href="#"><img src="{{ asset('frontend/img/logo.png') }}" alt="" /></a>
      </div>
      


      <div class="humberger__menu__widget">
        
          @guest
            <div class="header__top__right__language">
              <div class="header__top__right__auth">
                
                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
              </div>
            </div>
            <div class="header__top__right__auth" style="margin-left: 20px">
              <a href="{{ route('register') }}"><i class="fa fa-user"></i> Register</a>
            </div>
          @else 
          
          <div class="header__top__right__language">

                           

            <div class="header__top__right__auth">
              <a href="{{url('cart')}}"><i class="fa fa-user"></i> {{ auth()->user()->username }}</a>
            </div>
            <span class="arrow_carrot-down"></span>
            
 

          </div>
          <div class="header__top__right__auth" style="margin-left: 20px">
            <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-user"></i> Logout</a>
            <form action="{{ route('logout') }}" id="logout-form" method="post">
              @csrf 

            </form>
          </div>
          @endguest
      </div>



      <nav class="humberger__menu__nav mobile-menu">
        <ul>
          <li class="active"><a href="/">Home</a></li>
          <li><a href="{{ route('shop.index') }}">Shop</a></li>
          <li>
            <a href="url{{ ('categories') }}">Cateegories</a>
            <ul class="header__menu__dropdown">
              @foreach($menu_categories as $menu_category)
                <li><a href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a></li>
                <img src="{{ asset('frontend/img/categories/cat-1.jpg') }}" alt="" />
              @endforeach
            </ul>
          </li>
          <li><a href="#">Contact</a></li>
          <li><a href="{{route('blog') }}">blog</a></li>
        </ul>
      </nav>




      <div id="mobile-menu-wrap"></div>
      <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
      </div>



      <div class="humberger__menu__contact">
        <ul>
          <li><i class="fa fa-envelope"></i> cosmitik@gmail.com</li>
          <li>Free Shipping for all Order of $99</li>
        </ul>
      </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        @auth
      <div class="humberger__menu__cart">
        <ul>
          <li>
                         <a href="{{url('cart')}}">

              <i class="fa fa-shopping-bag"></i> <span>{{ $cartCount }}</span>
            </a>
          </li>
        </ul>
        
        <div class="header__cart__price">item: <span>${{ $cartTotal }}</span></div>
      </div>
    @endauth 
      <div class="header__top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="header__top__left">
                <ul>
                  <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" className='ico1'>
            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
          </svg></li>
                  <li>Dermatologist Approved</li>
                  <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16" className='ico2'>
            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
          </svg></li>
                  <li>Free national Shipping On Orders 500MAD+</li>
                  <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16" className='ico4'>
            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
            <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
          </svg></li>
                  <li>service.client@gmail.com</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
                @guest
                  <div class="header__top__right">
                    <div
                      class="header__top__right__language header__top__right__auth"
                    >
                      <a class="d-inline" href="{{ route('login') }}"
                        ><i class="fa fa-user"></i> Login</a
                      >
                    </div>
                    <div class="header__top__right__auth">
                      <a href="{{ route('register') }}"><i class="fa fa-user"></i> Register</a>
                    </div>
                </div>
                @else 
                <div class="header__top__right">

                
                <div
                  class="header__top__right__language header__top__right__auth"
                >
                  <a class="d-inline" href="#"
                    ><i class="fa fa-user"></i> {{ auth()->user()->username }}</a
                  >
                  <span class="arrow_carrot-down"></span>


                  
                  
                </div>
                <div class="header__top__right__auth">
                  <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()"><i class="fa fa-user"></i> Logout</a>
                  <form action="{{ route('logout') }}" id="logout-form" method="post">
                    @csrf                   
                  </form>
                </div>
              </div>
                @endguest
            </div>

          </div>
        </div>
      </div>


      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <nav class="header__menu">
              <ul>
                <li class="active"><a href="/" >Home</a></li>
                <li><a href="{{ route('shop.index') }}" >Shop</a></li>
                <li>
                  <a href="{{url('categories')}}" >Categories</a>
                  <ul class="header__menu__dropdown">
                    @foreach($menu_categories as $menu_category)
                      <li><a href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li><a href="{{ route('contact.index') }}" >Contact US</a></li>
                <li><a href="{{ route('blog') }}" >Blog</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-lg-3">
            <div class="header__logo">
              <a href="/"><img src="{{ asset('frontend/img/logo.png') }}" width=78% /></a>
            </div>
          </div>



          <!-- <div class="col-lg-3">
              @auth
            <div class="header__cart">
             
              <ul>
                
                <li>
                  <a href="{{ route('cart.index') }}"
                    ><i class="fa fa-shopping-bag"></i> <span>{{ $cartCount }}</span></a
                  >
                </li>
              </ul>
              <div class="header__cart__price">item: <span>${{ $cartTotal }}</span></div>
              @endauth
            </div>
          </div> -->




        </div>
        <div class="humberger__open">
          <i class="fa fa-bars"></i>
        </div>
      </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero__search">
              <div class="hero__search__form">
                <form action="{{url('search_product')}}" method="post">
                  @csrf
                  <input type="text" name="product"   $maxLength="7" minlength="3" required placeholder="Search for a product" />
                  <button type="submit" class="site-btn">RECHERCHER</button>
                </form>
              </div>


              <div class="hero__search__phone">
                <div class="hero__search__phone__icon">
                  <i class="fa fa-phone"></i>
                </div>
                <div class="hero__search__phone__text">
                  <h5>+06 61 55 66 77</h5>
                  <span>support 24/7 time</span>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Hero Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
    <div class="container">
    <div class="row">

      <!-- Section À propos -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="footer__about">
          <div class="footer__about__logo">
            <a href="{{ url('/') }}">
              <img src="{{ asset('frontend/img/logo.png') }}" alt="Logo" />
            </a>
          </div>
          <ul>
            <li>Address: Centre Mix Hay Nahda, Rabat</li>
            <li>Phone: +212 7.72.34.74.88</li>
            <li>Email: cosmitik@gmail.com</li>
          </ul>
        </div>
      </div>

      <!-- Section Partenaire / Logo -->
      <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
        <div class="footer__widget">
          <h6></h6>
          <a href="https://ofppt.com" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('frontend/img/ofppt.png') }}" alt="OFPT Logo" />
          </a>
          <!-- 
            Commentaires d’anciennes listes (si besoin, à réactiver)
            <ul> ... </ul> 
          -->
        </div>
      </div>

      <!-- Section Newsletter -->
      <div class="col-lg-4 col-md-12">
        <div class="footer__widget">
          <h6>Join Our Newsletter Now</h6>
          <p>Get E-mail updates about our latest shop and special offers.</p>
          <form action="{{ route('subscribe') }}" method="post">
            @csrf
            <input type="text" name="email" placeholder="Enter your mail" required />
            <button type="submit" class="site-btn">Subscribe</button>
          </form>

          <div class="footer__widget__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
          </div>
        </div>
      </div>

    </div>

    <!-- Ligne copyright & paiement -->
    <div class="row">
      <div class="col-lg-12">
        <div class="footer__copyright d-flex justify-content-between align-items-center flex-wrap">
          <div class="footer__copyright__text">
            <p>
              &copy;
              <script>document.write(new Date().getFullYear());</script>
              ISGI Devlppement Digital Option Web Full Stack
              <i class="fa fa-heart" aria-hidden="true"></i> by
              <a href="https://colorlib.com" target="_blank" rel="noopener noreferrer">DEVOWF202</a>
            </p>
          </div>
          <div class="footer__copyright__payment">
            <img src="{{ asset('frontend/img/payment-item.png') }}" alt="Payment Methods" />
          </div>
        </div>
      </div>
    </div>
    </div>
    </footer>



    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>