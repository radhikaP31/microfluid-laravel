<x-app-layout>
  <x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
    {{ __('Industry | Microfluid Process Equipment') }}
  </x-slot>

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block container mb-3">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif

  {{ Breadcrumbs::render('industry') }}
  <main id="main">
    <!-- <hr style="margin: 2% 10%;background: #b5b5b5;" /> -->
    <!-- ======= Industry Section ======= -->
    <section id="industry" class="industry">
      <div class="container">
        <div class="row">
          <h2 class="primary-text header-font-size">{{ $fieldApplication->mstr_nm}}</h2>
        </div>
        <div class="col-md-12 row">
          <div class="col-md-8">
            {{ $fieldApplication->mstr_desc }}
            <br><br>
            @php echo $fieldApplication->section_desc @endphp
          </div>
          <div class="col-md-4">
            <img alt="{{ $fieldApplication->mstr_nm }}" src="{{ url($fieldApplication->mstr_img) }}" style="border-radius: 8px;" />
          </div>
        </div>
      </div>
    </section><!-- End Industry Section -->
  </main><!-- End #main -->
</x-app-layout>
<style>

</style>