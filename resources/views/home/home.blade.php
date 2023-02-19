<x-app-layout>
	<x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
		{{ __('Home | Microfluid Process Equipment') }}
	</x-slot>

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
	<section id="hero" class="hero head_content">
		<div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

			<div class="carousel-inner" role="listbox">

				<!-- Slide 1 -->
				<div class="carousel-item active" style="background-image: url( {{url('images/slide/slide-1.jpg') }})">
					<div class="carousel-container">
						<div class="carousel-content animate__animated animate__fadeInUp">
						</div>
					</div>
				</div>

				<!-- Slide 2 -->
				<!-- <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
					<div class="carousel-container">
						<div class="carousel-content animate__animated animate__fadeInUp">
							<h2>Lorem Ipsum Dolor</h2>
							<p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
							<div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
						</div>
					</div>
				</div> -->

				<!-- Slide 3 -->
				<!-- <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
					<div class="carousel-container">
						<div class="carousel-content animate__animated animate__fadeInUp">
							<h2>Sequi ea ut et est quaerat</h2>
							<p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
							<div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
						</div>
					</div>
				</div> -->

			</div>

			<a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>

			<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

		</div>
	</section><!-- End Hero -->

	<main id="main">

		<!-- ======= What we offer/services Section ======= -->
		<section id="what-we-offer services" class="what-we-offer services section-bg">
			<div class="container">

				<div class="section-title">
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
										<div id="cta">
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
				<a href="<?php echo config('app.base_url') . '/products/1/1'; ?>" class="btn btn-primary font-16 primary-text" style="border-radius: 30px;padding: 7px 20px 7px 20px;"><b>Read More</b></a>
			</div>
		</section><!-- End What we offer/services Section -->

		<!-- <hr style="border-width: 2px;background-color: var(--secondary_color);" class="container"> -->

		<!-- ======= Field of application Section ======= -->
		<section id="field-appilication" class="field-appilication" style="background: #fff !important">
			<div class="container">

				<div class="row">

					<div class="col-lg-4 col-md-6 align-items-stretch min-height310 mt-4">
						<div class="icon-box field-find-more section-bg">
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
								<a target="_self" href="<?php echo config('app.base_url') . $field->mstr_link; ?>"><img alt="{{ $field->mstr_nm }}" src="{{ url($field->mstr_img) }}"></a>
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
					<div class="about-section-title section-title">
						<h2 class="primary-text header-font-size" style="text-align: left;top: 30px;left: 30px;">About Us</h2>
						<p class="text-left font-16 letter-spacing text-justify font-family-sans-serif" style="padding-left: 30px;">
							<br>From last many years of now, <span class="primary-text"> Microfluid Process Equipment </span> has been persistently in its profession to provide best-in-class products and after sales service.<br><br>
							<span class="primary-text"> Microfluid Process Equipment </span> have more than 25 years of experience in manufacturing, process industries and high pressure reciprocating pumps and homogenizers.
						</p>
					</div>
					<div class="text-left" style="padding-left: 30px;padding-top: 16px;"><a href="<?php echo config('app.base_url') . '/about'; ?>" class="btn btn-primary font-16 primary-text about-read-more"><b>Read More</b></a></div>
				</div>
				<div class="col-md-5">
					<iframe style="padding-top: 7%;height: 100%;width: 100%;" id="player" src="https://www.youtube.com/embed/r5MhAK8lAmU" allowfullscreen="true" scrolling="no" frameborder="0"></iframe>
					<!-- <a target="_self" href="#"><img alt="Homogenizers" src="assets/img/application/homogenizers.jpeg" style="height: auto;width: 94%;padding-top: 33px;padding-left: 31%;"></a> -->
				</div>
			</div>
		</section>
		<!-- End About Us Section -->

	</main><!-- End #main -->

</x-app-layout>