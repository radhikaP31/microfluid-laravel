<x-app-layout>
  <x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
    {{ __('Industries | Microfluid Process Equipment') }}
  </x-slot>

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block container mb-3">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif

  {{ Breadcrumbs::render('industries') }}
  <main id="main">
    <!-- <hr style="margin: 2% 10%;background: #b5b5b5;" /> -->
    <!-- ======= Industries Section ======= -->
    <section id="industries" class="industries">
      <div class="container">
        <section id="field-appilication" class="field-appilication" style="background: #fff !important">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-6 align-items-stretch min-height310 mt-4">
                <div class="icon-box field-find-more section-bg">
                  <h4 class="primary-text header-font-size" style="text-align: left;padding-left: 7px;">Field of <br>Application</h4>
                  <hr style="width: 47%;margin-left: 6px;border-width: 4px;border-top: solid var(--secondary_color);">
                  <h4 class="primary-text body-font-size" style="text-align: left;padding-left: 7px;">Find a right solutions for your industry!!</h4>
                </div>
              </div>
              @if ($fieldApplication->count() > 0)
              @foreach($fieldApplication as $key => $field)
              <div class="col-lg-4 col-md-6 align-items-stretch mt-4">
                <div class="field field-has-link field-has-icon field-has-content">
                  <div class="field-header">
                    <a target="_self" href="<?php echo config('app.base_url') . $field->mstr_link; ?>"><img alt="{{ $field->mstr_nm }}" src="{{ url($field->mstr_img) }}"></a>
                  </div>
                  <div class="field-content">
                    <h3 class="field-title font-size-20 font-family-sans-serif primary-text">
                      <span class="iconify field-icon" data-icon="{{ $field->mstr_icon }}"></span>{{ $field->mstr_nm }}
                    </h3><!-- <br> -->
                    <p class="field-desc font-family-sans-serif">{{ $field->mstr_desc }}</p>
                    <a class="font-family-sans-serif" target="_self" href="<?php echo config('app.base_url') . '/industry/' . $field->slug; ?>">Read More</a>
                  </div>
                </div>
              </div>
              @endforeach
              @endif
            </div>
            <br>
          </div>
        </section>
      </div>
    </section><!-- End Industries Section -->
  </main><!-- End #main -->
</x-app-layout>