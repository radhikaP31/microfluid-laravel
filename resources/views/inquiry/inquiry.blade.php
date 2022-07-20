<x-app-layout>
    <x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
            {{ __('Inquiry | Microfluid Process Equipment') }}
    </x-slot>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block container mb-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

{{ Breadcrumbs::render('inquiry') }}
<main id="main">
   <!-- ======= Inquiry Section ======= -->
  <section class="row col-md-12 inquiry container-fluid" id="inquiry" style="padding-right: 0%;margin: 0px;padding-left: 0px;">


  </section><!-- End Inquiry Section -->
</main><!-- End #main -->
</x-app-layout>