<x-app-layout>
  <x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
    {{ __('Home | Microfluid Process Equipment') }}
  </x-slot>

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block container mb-3">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif

  {{ Breadcrumbs::render('product') }}
  <main id="main">
    <!-- ======= Product Section ======= -->
    <section class="row col-md-12 product container-fluid" id="product" style="padding: 20px 5% 20px 5%;margin: 0px;">

      @if($productData->count() > 0)
      <!-- main if 1 -->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container" style="padding-bottom: 1%;">
        <h2 class="primary-text header-font-size">{{ $productData->p_name }}</h2>
      </div>
      <div class="col-md-4" style="border-right: 1px solid black;">
        @if ($productData->image->count() > 0)
        <!-- product image start 1 -->
        @foreach($productData->image as $key => $image)
        <!-- product image start 2 -->

        <div class="my-product-slides">
          <div class="image-number-text">1 / 2</div>
          <img src="{{ url($image['img_path']) }}" class="product_active_img">
        </div>

        @endforeach
        <!-- product image end 1 -->
        @endif
        <!-- product image end 2 -->

        <a class="prev_arrow prev-product-img" data-slide_count="-1">
          <span class="iconify secondary-text" data-icon="ic:round-keyboard-double-arrow-left" data-width="32" data-height="32"></span>
        </a>
        <a class="next_arrow next-product-img" data-slide_count="1">
          <span class="iconify secondary-text" data-icon="ic:round-keyboard-double-arrow-right" data-width="32" data-height="32"></span>
        </a>

        <div class="row col-md-12">
          @if ($productData->image->count() > 0)
          <!-- product image start 1 -->
          @foreach($productData->image as $key => $image)
          <!-- product image start 2 -->
          @php $count = 1; @endphp
          <div class="col-md-4">
            <img class="product-image product-cursor " src="{{ url($image['img_path']) }}" style="width: auto; height: 70px;" data-slide="<?= $count; ?>">
          </div>

          @php $count++; @endphp
          @endforeach
          <!-- product image end 1 -->
          @endif
          <!-- product image end 2 -->
        </div>
      </div>

      <div class="col-md-8">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container" style="    padding-bottom: 2%;">
          <p>{{ $productData->p_description }}</p>
        </div>
        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 container" style="padding-bottom: 2%;">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="#" class="btn prod_desc_btn" data-toggle="modal" data-target="#req_quote">
              <img src="{{ url('images/icons/quote.png') }}" style="height: 96px; width: auto;" /><span class="header-font-size">Request Quote</span></a>
          </div>
        </div>
      </div>

      <!-- product keys nav section start -->
      <hr style="width: 100%;border-top: 1px solid var(--secondary_color);margin-bottom: 0px;">
      <nav class="navbar navbar-expand-lg navbar-light bg-light secondary-page-menu col-md-12">
        <div class="" id="navbarNav">
          <ul class="navbar-nav">

            @if ($productData->key->count() > 0)
            <!-- product key start 1 -->
            @php $count = 1; @endphp
            @foreach($productData->key as $key => $product_key)
            <!-- product key start 2 -->
            <li class="nav-item active">
              <a class="nav-link product-feature" href="#{{ $product_key->tab_name }}"><?= $product_key->key_name; ?></a>
            </li>
            @php $count++; @endphp
            @endforeach
            <!-- product key end 1 -->
            @endif
            <!-- product key end 2 -->

          </ul>
        </div>
      </nav>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container" style="padding-bottom: 2%;">
        @if ($productData->key->count() > 0)
        <!-- product feature start 1 -->
        @foreach($productData->key as $key => $product_key)
        <!-- product feature start 2 -->
        <div id="{{ $product_key->tab_name }}" style=" padding-top: 2%;">
          <h4 class="primary-text header-font-size" style="text-align: left;padding-left: 7px;">{{ $product_key->key_name }}</h4>

          @foreach($navDetails[$product_key->tab_name] as $navKey => $navValue)
          <!-- <h2> {{ $navValue->name}} </h2> -->
          <div> @php echo $navValue->description @endphp </div>
          @endforeach

        </div>
        @endforeach
        <!-- product key end 1 -->
        @endif
        <!-- product key end 2 -->

      </div>
      <!-- product keys nav section end -->

      @endif
      <!-- end main if 1 -->
    </section><!-- End Product Section -->
  </main><!-- End #main -->
</x-app-layout>

<script type="text/javascript">
  //product page js start
  let slideIndex = 1;
  showSlides(slideIndex);

  $('.prev-product-img,.next-product-img').click(function() {
    showSlides(slideIndex += jQuery(this).data('slide_count'));
  });

  $('.product-cursor').click(function() {
    showSlides(slideIndex = jQuery(this).data('slide'));
  });

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("my-product-slides");
    let dots = document.getElementsByClassName("product-image");
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active_product", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active_product";
  }
  //product page js end
</script>