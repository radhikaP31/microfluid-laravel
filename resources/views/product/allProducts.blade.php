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

  {{ Breadcrumbs::render('products') }}
  <main id="main">
    <!-- ======= Product Section ======= -->
    <section class="product container-fluid" id="product">
      <div class="row col-md-12 col-lg-12 col-sm-12 col-xs-12 m-0">
        <!-- Product category and sub category sidebar section end-->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="border-right: 1px solid var(--primary_color);">
          <div class="list-group product-list-group">
            @if ($allCategory->count() > 0)
            @foreach($allCategory as $key => $category)
            <a href="/products/{{$category->id}}" class="product-list-group-item list-group-item text-black product-cat letter-spacing" data-sc_cat="{{$category->c_code}}">{{$category->c_name}}</a>

            <!-- Product sub category sidebar section start-->
            <div class="list-group product-cat-filter product-cat-filter-{{$category->c_code}}" data-sc_cat="{{$category->c_code;}}" style="display: none;">
              @if($category->subCategory->count() > 0)
              @foreach($category->subCategory as $key => $subcategory)
              <a href="/products/{{$category->id}}/{{$subcategory->id}}" class="product-item list-group-item text-black">{{$subcategory->sc_name}}</a>
              @endforeach
              @endif
            </div>
            <!-- Product sub category sidebar section end-->
            @endforeach
            @endif
          </div>
        </div>

        <!-- Product category and sub category sidebar section end-->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 container" style="margin: unset;">
          <!-- Display Product Sub Category title, description start-->
          @if ($productData->count() > 0)
          @foreach($productData as $key => $title_product)
          @if($sub_cat_id)
          <h2 class="primary-text header-font-size">{{ $title_product->sc_name }}</h2>
          <p>{{ $title_product->sc_description }}</p>
          @else
          <h2 class="primary-text header-font-size">{{ $title_product->c_name }}</h2>
          <p>{{ $title_product->c_description }}</p>
          @endif
          @endforeach
          @endif
          <!-- Display Product Sub Category title, description end-->

          <!-- Display Category wise Products start-->
          <div class="row services">
            @if ($product_data && $product_data->count() > 0)
            @foreach ($product_data as $key => $product)
            <div class="col-lg-4 col-md-6 align-items-stretch min-height310">
              <div class="icon-box rounded shadow mb-5">
                <a href="/product/{{ $product->slug }}" class="service_name primary-text">
                  <div class="icon">
                    <img alt="{{ $product->p_name }}" src="{{ url($product->p_image) }}">
                  </div>
                  <h4>{{ $product->p_name }}</h4>
                </a>
                <p class="text-left">{{ substr($product->p_description, 0, 100) . ' ...' }}</p>
              </div>
            </div>
            @endforeach
            @else
            <div class="m-auto primary-text row"> Sorry, There is no product available in this category. We'll update it soon. </div>
            @endif
            <br>
          </div>
          <!-- Display Category wise Products end-->
        </div>
      </div>
    </section><!-- End Product Section -->
  </main><!-- End #main -->
</x-app-layout>