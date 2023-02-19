<x-app-layout>
    <x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
        {{ __('Contact | Microfluid Process Equipment') }}
    </x-slot>

    {{ Breadcrumbs::render('contact') }}
    <main id="main">
        <!-- ======= Contact Section ======= -->
        <div class="map-section">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d918.0252235723684!2d72.68446002916806!3d23.02006739905966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7c18885d95e2866!2zMjPCsDAxJzEyLjIiTiA3MsKwNDEnMDYuMCJF!5e0!3m2!1sen!2sin!4v1668525859982!5m2!1sen!2sin" style="border:0; width: 100%; height: 350px;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <section class="container contact container-fluid" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-4 info">
                                    <i class="icofont-google-map"></i>
                                    <h4 class="primary-text header-font-size">Location:</h4>
                                    <p class="text-black">Darshan Industrial Estate<br>Ahmedabad</p>
                                </div>

                                <div class=" col-lg-4 info mt-4 mt-lg-0">
                                    <i class="icofont-envelope"></i>
                                    <h4 class="primary-text header-font-size">Email:</h4>
                                    <p class="text-black"><a class="text-black hover-mail" href="mailto:sales@microfluidprocess.com">sales@microfluidprocess.com</a></p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="icofont-phone"></i>
                                    <h4 class="primary-text header-font-size">Call:</h4>
                                    <p class="text-black">+91 70168 65019<br>Parth Patel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-10">
                        <form method="post" action="/contact/add" enctype="multipart/form-data" id="contactForm" class="contactForm mb-5">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="name" class="col-form-label">Name <span class="text-red">*</span></span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Your Name" />
                                    @error('name')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="email" class="col-form-label">Email <span class="text-red">*</span></label>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Your Email" />
                                    @error('email')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="subject" class="col-form-label">Subject <span class="text-red">*</span></label>
                                    <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" placeholder="Your Subject" />
                                    @error('subject')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="message" class="col-form-label">Message <span class="text-red">*</span></label>
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="4" placeholder="Write your message">{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center mt-3"><button type="submit" class="btn btn-primary primary-text rounded-0 py-2 px-4 submit_inquiry">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->
    </main><!-- End #main -->
</x-app-layout>