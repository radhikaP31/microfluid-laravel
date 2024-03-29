<x-app-layout>
	@section('title',"$metaDetails->meta_title")
	@section('metadesc',"$metaDetails->meta_description")
	@section('metakeyword',"$metaDetails->meta_keywords")
	<!-- @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block container mb-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif -->
	<script>
		$(function() {
			@if(Session::get('success'))
			console.log('test');
			swal({
				icon: 'success',
				title: 'Success!',
				text: '{{ Session::get("success") }}'
			});
			@endif
		});
	</script>

	<!-- ======= Hero Section ======= -->
	<div class="wrapper">
		<div class="carousel">
			<div class="slide"><img src="{{ asset('images/slide/slide-1.png') }}"></div>
			<div class="slide"><img src="{{ asset('images/slide/slide-2.png') }}"></div>
			<div class="slide"><img src="{{ asset('images/slide/slide-3.png') }}"></div>
		</div>
	</div>
	<!-- End Hero -->

	<main id="main">
		<!-- ======= What we offer/services Section ======= -->
		<section id="what-we-offer services" class="what-we-offer services white-bg">
			<div class="container">

				<div class="section-title text-center">
					<h2 class="primary-text header-font-size">What We Offer</strong></h2>
				</div>

				<div class="row">
					@if ($whatWeOfferData->count() > 0)
					@foreach($whatWeOfferData as $key => $offer)
					<div class="col-lg-3 col-md-6 align-items-stretch min-height310  ">
						<div class="icon-box service-box rounded shadow mb-5">
							<div class="icon">
								<img alt="{{ $offer->mstr_nm }}" src="{{ url($offer->mstr_img) }}">
							</div>
							<!-- <h4><a href="{{ $offer->mstr_link }}" class="service_name primary-text">{{ $offer->mstr_nm }}&nbsp;&nbsp;<i class="fa fa-arrow-right" style="font-size: 13px;"></i></a></h4> -->
							<h4>
								<a href="<?php echo config('app.base_url') . $offer->mstr_link; ?>" class="service_name primary-text font-16">{{ $offer->mstr_nm }}&nbsp;&nbsp;
									<div class="round">
										<div class="cta">
											<span class="arrow primera next "></span>
											<span class="arrow segunda next "></span>
										</div>
									</div>
								</a>
							</h4>
						</div>
					</div>
					@endforeach
					@endif
					<br>
				</div>
			</div>
			<div class="text-center">
				<a href="<?php echo config('app.base_url') . '/product/1/1'; ?>" class="btn btn-primary font-16 primary-text" style="border-radius: 30px;padding: 7px 20px 7px 20px;"><b>Read More</b></a>
			</div>
		</section><!-- End What we offer/services Section -->

		<!-- <hr style="border-width: 2px;background-color: var(--secondary_color);" class="container"> -->

		<!-- ======= Field of application Section ======= -->
		<section id="field-appilication" class="field-appilication" style="background: #fff !important">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6 align-items-stretch min-height310 mt-4">
						<div class="icon-box field-find-more white-bg">
							<h4 class="primary-text header-font-size" style="text-align: left;padding-left: 7px;">Field of <br>Application</h4>
							<hr style="width: 47%;margin-left: 6px;border-width: 4px;border-top: solid var(--secondary_color);">
							<h4 class="primary-text body-font-size" style="text-align: left;padding-left: 7px;"><a href="<?php echo config('app.base_url') . '/industries'; ?>" class="text-black">Find a right solutions for your industry!!</a></h4>
						</div>
					</div>
					@if ($fieldApplication->count() > 0)
					@foreach($fieldApplication as $key => $field)
					<div class="col-lg-4 col-md-6 align-items-stretch mt-4">
						<div class="field field-has-link field-has-icon field-has-content">
							<div class="field-header">
								<a target="_self" href="<?php echo config('app.base_url') . '/industry/' . $field->slug; ?>"><img alt="{{ $field->mstr_nm }}" src="{{ url($field->mstr_img) }}"></a>
							</div>
							<div class="field-content">
								<h3 class="field-title font-size-20 font-family-sans-serif primary-text">
									<span class="iconify field-icon" data-icon="{{ $field->mstr_icon }}"></span>{{ $field->mstr_nm }}
								</h3><!-- <br> -->
								<p class="field-desc font-family-sans-serif">{{ $field->mstr_desc }}</p>
								<a class="font-family-sans-serif" target="_self" href="<?php echo config('app.base_url') . '/industry/' . $field->slug; ?>">Read More »</a>
							</div>
						</div>
					</div>
					@endforeach
					@endif
				</div>
				<br>
				<div class="text-center">
					<a href="<?php echo config('app.base_url') . '/industries'; ?>" class="btn btn-primary font-16 primary-text" style="border-radius: 30px;padding: 7px 20px 7px 20px;"><b>Read More</b></a>
				</div>
			</div>
		</section><!-- End Field of application Section -->
		<!-- <hr style="border-width: 2px;background-color: var(--secondary_color);" class="container"> -->
		<!-- ======= About Us Section ======= -->
		<section id="home-about-us" class="home-about-us">
			<div class="row col-md-12">
				<div class="col-md-7">
					<div class="about-section-title section-title text-center">
						<h2 class="primary-text header-font-size" style="text-align: left;top: 30px;left: 30px;">About Us</h2>
						<p class="text-left font-16 letter-spacing text-justify font-family-sans-serif" style="padding-left: 30px;">
							<br>From last many years of now, <span class="primary-text"> Microfluid Process Equipment </span> has been persistently in its profession to provide best-in-class products and after sales service.<br><br>
							<span class="primary-text"> Microfluid Process Equipment </span> have more than 25 years of experience in manufacturing, process industries and high pressure reciprocating pumps and homogenizers.
						</p>
					</div>
					<div class="text-left" style="padding-left: 30px;padding-top: 16px;padding-bottom:20px;"><a href="<?php echo config('app.base_url') . '/about-us'; ?>" class="btn btn-primary font-16 primary-text about-read-more"><b>Read More</b></a></div>
				</div>
			</div>
		</section>
		<!-- End About Us Section -->

	</main><!-- End #main -->

</x-app-layout>