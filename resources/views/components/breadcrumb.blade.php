@unless($breadcrumbs->isEmpty())

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs" style="padding: 0px;height: 100%;background-image: url({{url('images/breadcrumb/breadcrumb_img.png') }});background-size: cover;">
  <div class="opacity-breadcrumbs" style="position: absolute;z-index: 0;opacity: 0.8;width: 100%;height: 100%;background: white;"></div>
  <div class="col-md-12 d-flex justify-content-between align-items-center" style="bottom: -4%;height: auto; min-height: 8em;">
    <h3 class="text-left primary-text breadcrumb-text">{{ __('Microfluid is one of the leading manufacturer of process equipment ') }}</h3>
  </div>
  <div class="col-md-12 d-flex justify-content-between align-items-center" style="bottom: -9%;background: rgb(0 0 0 / 48%);letter-spacing: 1.3px;">
    <h2 class="primary-text breadcrumb-link" style="margin: 9px 4rem;">
      @foreach($breadcrumbs as $breadcrumb)
      @if(!is_null($breadcrumb->url) && !$loop->last)
      <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
      @else
      <a class="breadcrumb-item active text-white">{{ ucfirst($breadcrumb->title) }}</a>
      @endif
      @if(!$loop->last)
      |
      @endif
      @endforeach
    </h2>
  </div>
  </div>
</section>
<!-- End Breadcrumbs -->
@endunless