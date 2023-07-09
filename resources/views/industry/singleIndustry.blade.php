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

  {{ Breadcrumbs::render('industry') }}
  <main id="main" class="industry-page">
    <!-- ======= Industry Section ======= -->
    <section id="industry" class="industry-section row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container" style="padding-bottom: 3%;">
        <h2 class="primary-text header-font-size font-30" style="font-weight:bolder;">{{ $fieldApplication->mstr_nm}}</h2>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-7">
          <p class="text-gray letter-spacing text-justify font-family-sans-serif">{{ $fieldApplication->mstr_desc }}</p>
          @php echo $fieldApplication->section_desc @endphp
        </div>
        <div class="col-md-5">
          <img alt="{{ $fieldApplication->mstr_nm }}" src="{{ url($fieldApplication->mstr_img) }}" class="field-image" />
        </div>
      </div>
    </section><!-- End Industry Section -->
  </main><!-- End #main -->
</x-app-layout>