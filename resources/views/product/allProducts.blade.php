<x-app-layout>
  @section('title',"$metaDetails->meta_title")
  @section('metadesc',"$metaDetails->meta_description")
  @section('metakeyword',"$metaDetails->meta_keywords")

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block container mb-3">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif

  {{ Breadcrumbs::render('products') }}
  <main id="main">
    <!-- ======= Product Section ======= -->
    <section class="all-product container-fluid" id="product">
      <div class="row col-md-12 col-lg-12 col-sm-12 col-xs-12 m-0">
        <!-- Product category and sub category sidebar section end-->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="border-right: 1px solid #e7e7e7;">
          <div class="list-group product-list-group">
            @if ($allCategory->count() > 0)
            @foreach($allCategory as $key => $category)
            <div class="list-group-wrapper">
              <a href="<?php echo config('app.base_url') . '/product/' . $category->id; ?>" class="product-list-group-item list-group-item font-20 product-cat letter-spacing <?php if (request()->id == $category->id) {echo "active";} ?>" data-sc_cat="{{$category->c_code}}">{{$category->c_name}}</a>
              <!-- Product sub category sidebar section start-->
              <div class="list-group product-cat-filter product-cat-filter-{{$category->c_code}}" data-sc_cat="{{$category->c_code;}} {{request()->id}}" style="<?php if (request()->id != $category->id) {"display: none;";} ?>">
                @if($category->subCategory->count() > 0)
                @foreach($category->subCategory as $key => $subcategory)
                @if($subcategory->is_deleted == 0)
                <a href="<?php echo config('app.base_url') . '/product/' . $category->id . '/' . $subcategory->id; ?>" class="product-item list-group-item body-font-size">{{$subcategory->sc_name}}</a>
                @endif
                @endforeach
                @endif
              </div>
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
          <!-- <p class="font-18">{{ $title_product->sc_description }}</p> -->
          @else
          <h2 class=" primary-text header-font-size">{{ $title_product->c_name }}</h2>
          <!-- <p class="font-18">{{ $title_product->c_description }}</p> -->
          @endif
          @endforeach
          @endif
          <!-- Display Product Sub Category title, description end-->

          <!-- Display Category wise Products start-->
          <div class="row services" style="padding: 3%;">
            @if ($product_data && $product_data->count() > 0)
            @foreach ($product_data as $key => $product)
            <div class="col-lg-4 col-md-6 align-items-stretch">
              <div class="product-icon-box font-18 rounded mb-5 product-box">
                <a href="<?php echo config('app.base_url') . '/products/' . $product->slug; ?>" class="service_name primary-text">
                  <div class="icon">
                    <img alt="{{ $product->p_name }}" src="{{ url($product->p_image) }}">
                  </div>
                  <div>
                    <div style="height:47px;">
                      <h4 class="text-black" style=" padding-top: 8px;">{{ $product->p_name }}</h4>
                    </div>
                  </div>
                </a>
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