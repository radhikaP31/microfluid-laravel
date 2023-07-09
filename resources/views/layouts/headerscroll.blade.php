<header id="header" class="header">
  <!-- email, contact info -->
  <div class="container d-flex align-items-center top-container" style="height:75px;padding-left: 0%;padding-right: 0%;margin-bottom: 0%;">
    <a href="<?php echo config('app.base_url'); ?>" class="logo mr-auto"><img src="{{ asset('images/Logo.png') }}" alt="" class="img-fluid"></a>
    <span class="primary-text font-18" style="margin-right: 4%;"><i class="fa fa-phone fa-rotate-90"></i> <span>+91 70168 65019</span> </span>
    <span class="primary-text font-18" style="margin-right: 4%;width: 25%;letter-spacing: 1px;"><i class="fa fa-envelope"></i>&nbsp;<a class="primary-text hover-mail" href="mailto:sales@microfluidprocess.com"><span>sales@microfluidprocess.com</span></a> </span>
    <a href="#" class="btn btn-primary primary-text get_quote font-18" data-toggle="modal" data-target="#getQuoteModal" style="border-radius: 30px;">Get a Fair Quote</a>
  </div>

  <div class="container-fluid d-flex align-items-center padding0 primary-bg header" id="myHeader">
    <div class="list-logo" style="margin-left:5%;top: 4px;"><a href="<?php echo config('app.base_url'); ?>" class="logo mr-auto"><img src="{{ asset('images/Logo.png') }}" alt="" class="img-fluid"></a>
    </div>
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
          <a href="{{route('product',['id' => 1])}}">{{ __('Products') }}</a>
        </x-nav-link>
        <x-nav-link :active="request()->routeIs('industries')">
          <a href="{{route('industries')}}">{{ __('Industries') }}</a>
        </x-nav-link>
        {{-- <x-nav-link :active="request()->routeIs('blogs')" >
              <a href="{{route('blogs')}}">{{ __('Blogs') }}</a>
        </x-nav-link>
        <x-nav-link :active="request()->routeIs('inquiry')">
          <a href="{{route('inquiry')}}">{{ __('Inquiry') }}</a>
        </x-nav-link> --}}
        <x-nav-link :active="request()->routeIs('contact')">
          <a href="{{route('contact')}}">{{ __('Contact') }}</a>
        </x-nav-link>
        <x-nav-link :active="request()->routeIs('download')">
          <a href="{{route('download')}}">{{ __('Download') }}</a>
        </x-nav-link>
      </ul>
    </nav><!-- .nav-menu -->

    <div class="header-social-links">
      <!-- <a href="#" class="twitter"><i class="icofont-twitter"></i></a> -->
      <a href="https://api.whatsapp.com/send?phone=917016865019&amp;text=Hi, I want to business with you!!" target="_blank" class="whatsapp font-17"><i class="bx bxl-whatsapp"></i></a>
      <a href="https://www.facebook.com/Microfluid" class="facebook font-17" target="_blank"><i class="icofont-facebook"></i></a>
      <a href="https://www.linkedin.com/company/microfluid/?viewAsMember=true" class="linkedin font-17" target="_blank"><i class="icofont-linkedin"></i></i></a>
      <!-- <a href="#" class="instagram font-17" target="_blank"><i class="icofont-instagram"></i></a> -->
    </div>
    <button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>
  </div>

  <!-- Get in Touch Modal start -->
  <div class="modal fade-in" id="getQuoteModal" tabindex="-1" role="dialog" aria-labelledby="getQuoteModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-20"> Get a Fair Quote</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('quote_add') }}" enctype="multipart/form-data" id="contactForm" class="contactForm mb-5">
            @csrf
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Your Name*" />
                @error('name')
                <div class="text-red text-10">{{ $errors->first('name') }}</div>
                @enderror
              </div>
              <div class="col-md-6 form-group mb-3">
                <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Your Email*" />
                @error('email')
                <div class="text-red text-10">{{ $errors->first('email') }}</div>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number') }}" placeholder="Your Contact Number*" />
                @error('contact_number')
                <div class="text-red text-10 is-invalid">{{ $errors->first('contact_number') }}</div>
                @enderror
              </div>
              <div class="col-md-6 form-group mb-3">
                <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control" placeholder="Your Company Name*" />
                @error('company_name')
                <div class="text-red text-10 is-invalid">{{ $errors->first('company_name') }}</div>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group mb-3">
                <textarea class="form-control" name="message" id="message" cols="30" rows="4" placeholder="Write your Message Here*">{{ old('message') }}</textarea>
                @error('message')
                <div class="text-red text-10">{{ $errors->first('message') }}</div>
                @enderror
              </div>
            </div>
            <div class="text-center mt-3"><button type="submit" class="btn btn-primary primary-text rounded-0 py-2 px-4 submit_inquiry font-16"><b>Send Message</b></button></div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    @if($errors->has('name') || $errors->has('email') || $errors->has('contact_number') || $errors->has('company_name') || $errors->has('message'))
    $('#getQuoteModal').modal('show');
    @endif
  </script>
  <!-- Get in Touch Modal end -->
</header>
<div class="header_space"></div>