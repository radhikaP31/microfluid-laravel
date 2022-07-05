<x-app-layout>
	<x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
            {{ __('Blog | Microfluid Process Equipment') }}
    </x-slot>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block container mb-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif


{{ Breadcrumbs::render('blog') }}
  <main id="main">
    <!-- <hr style="margin: 2% 10%;background: #b5b5b5;" /> -->
    <!-- ======= Blog Section ======= -->
    <section class="blog container-fluid" id="blog">
      <div class="row col-md-12 col-lg-12 col-sm-12 col-xs-12 m-0">


        
      </div>
    </section><!-- End Blog Section -->
  </main><!-- End #main -->
</x-app-layout>