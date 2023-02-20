<header id="header" class="header">
  <!-- email, contact info -->
  <div class="container d-flex align-items-center top-container" style="height:68px;padding-left: 0%;padding-right: 0%;margin-bottom: 0%;">
    <a href="<?php echo config('app.base_url'); ?>" class="logo mr-auto"><img src="{{ asset('images/Logo.png') }}" alt="" class="img-fluid"></a>
    <span class="primary-text font-18" style="margin-right: 4%;"><i class="fa fa-phone fa-rotate-90"></i> +91 70168 65019 </span>
    <span class="primary-text font-18" style="margin-right: 4%;width: 25%;letter-spacing: 1px;"><i class="fa fa-envelope"></i>&nbsp;<a class="primary-text hover-mail" href="mailto:sales@microfluidprocess.com">sales@microfluidprocess.com</a> </span>
    <a href="<?php echo config('app.base_url') . '/inquiry'; ?>" class="btn btn-primary primary-text get_quote font-18" style="border-radius: 30px;">Get a Fair Quote</a>
  </div>

  <div class="container-fluid d-flex align-items-center padding0 primary-bg header" id="myHeader">

    <nav class="nav-menu d-none d-lg-block">
      <div class="list-logo" style="margin-left:5%;top: 4px;"><a href="<?php echo config('app.base_url'); ?>" class="logo mr-auto"><img src="{{ asset('images/Logo.png') }}" alt="" class="img-fluid"></a>
      </div>
      <ul>
        <x-nav-link :active="request()->routeIs('home')">
          <a href="{{route('home')}}">{{ __('Home') }}</a>
        </x-nav-link>
        <x-nav-link :active="request()->routeIs('about')">
          <a href="{{route('about')}}">{{ __('About Us') }}</a>
        </x-nav-link>
        <x-nav-link :active="request()->routeIs('products')">
          <a href="{{route('products',['id' => 1])}}">{{ __('Products') }}</a>
        </x-nav-link>
        <x-nav-link :active="request()->routeIs('industries')">
          <a href="{{route('industries')}}">{{ __('Industries') }}</a>
        </x-nav-link>
        <!-- <x-nav-link :active="request()->routeIs('blogs')" >
              <a href="{{route('blogs')}}">{{ __('Blogs') }}</a>
            </x-nav-link> -->
        <x-nav-link :active="request()->routeIs('inquiry')">
          <a href="{{route('inquiry')}}">{{ __('Inquiry') }}</a>
        </x-nav-link>
        <x-nav-link :active="request()->routeIs('contact')">
          <a href="{{route('contact')}}">{{ __('Contact') }}</a>
        </x-nav-link>
      </ul>
    </nav><!-- .nav-menu -->

    <div class="header-social-links">
      <!-- <a href="#" class="twitter"><i class="icofont-twitter"></i></a> -->
      <a href="https://api.whatsapp.com/send?phone=917016865019&amp;text=Hi, I want to business with you!!" target="_blank" class="whatsapp"><i class="bx bxl-whatsapp font-17"></i></a>
      <a href="#" class="facebook font-17"><i class="icofont-facebook"></i></a>
      <a href="#" class="linkedin font-17"><i class="icofont-linkedin"></i></i></a>
      <a href="#" class="instagram font-17"><i class="icofont-instagram"></i></a>

    </div>

  </div>
</header>

<div class="header_space"></div>