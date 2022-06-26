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
              <?php $product_cat_tab = $query_obj->getAllProductCategories(); //get all product category
                  if ($product_cat_tab->num_rows > 0) {
                    while($cat = $product_cat_tab->fetch_assoc()) { ?>
                      <a href="<?php echo BASE_URL.'/products.php?category_id='.$cat['id'] ?>" class="product-list-group-item list-group-item text-black product-cat letter-spacing" data-sc_cat="<?php echo $cat['c_code'] ?>"><?php echo $cat['c_name'] ?></a>

                        <!-- Product sub category sidebar section start-->
                        <div class="list-group product-cat-filter <?php echo 'product-cat-filter-'.$cat['c_code']; ?>" data-sc_cat="<?php echo $cat['c_code']; ?>" style="display: none;">
                          <?php $products_tab = $query_obj->getProductSubCategoryByCategoryID($cat['id']); //get category wise products product
                          if ($products_tab->num_rows > 0) { 
                            while($product = $products_tab->fetch_assoc()) { ?>
                                <a href="<?php echo BASE_URL.'/products.php?category_id='.$cat['id'].'&sub_cat_id='.$product['id']?>" class="product-item list-group-item text-black"><?php echo $product['sc_name'] ?></a>
                          <?php } ?>
                         <?php } ?> 
                        </div>
                        <!-- Product sub category sidebar section end-->
                   <?php } ?>
                  <?php } ?> 
          </div> 
        </div>
      </div>
  </section><!-- End Product Section -->
</main><!-- End #main -->


</x-app-layout>