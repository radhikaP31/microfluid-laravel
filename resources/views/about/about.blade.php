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
    
{{ Breadcrumbs::render('about') }}
  <main id="main">
    <!-- <hr style="margin: 2% 10%;background: #b5b5b5;" /> -->
    <!-- ======= About Us Section ======= -->
    <section class="about-us container-fluid" id="about-us">
      <div class="row col-md-12 col-lg-12 col-sm-12 col-xs-12 m-0">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="border-right: 1px solid var(--primary_color);">
          <div class="about-list-group">
                  @if ($aboutUsInformation->count() > 0)
                    @foreach($aboutUsInformation as $key => $about)
                      <a href="javascript:void(0)" class="list-group-item text-black block-filter" data-block_type="{{ $about->tab_name }}">{{ $about->name }}</a>
                    @endforeach
                  @endif
          </div> 
          <!-- <nav class="navbar navbar-default block-filter-section" style="display: block;">
            <ul class="about-us-nav nav navbar-nav">
              @if ($aboutUsInformation->count() > 0)
                @foreach($aboutUsInformation as $key => $about)
                      <li class="block-filter" data-block_type="{{ $about->tab_name }}">
                        <a href="javascript:void(0)" class="text-black">{{ $about->name }}</a>
                      </li>
                @endforeach
              @endif         
            </ul>  
          </nav> -->
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 container about-us-blocks " style="margin: unset;">
          @if ($aboutUsInformation->count() > 0)
            @foreach($aboutUsInformation as $key => $about_details)
                <div class="block-type {{ 'block-type-'.$about_details->tab_name }}" data-block_type="{{ $about_details->tab_name }}" style="display: none;">
                  <div class="section-title ">
                      <h2 class="primary-text header-font-size text-center mb-4 ">{{ $about_details->name }}
                      </h2>
                  </div>
                  @php echo $about_details->description //don't change it @endphp
                </div>
              @endforeach
            @endif
        </div>
      </div>
    </section><!-- End About Us Section -->
  </main><!-- End #main -->
</x-app-layout>