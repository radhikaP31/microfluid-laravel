<x-app-layout>
    <x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
        {{ __('Contact | Microfluid Process Equipment') }}
    </x-slot>

    {{ Breadcrumbs::render('contact') }}
    <main id="main" class="contact-us-page">
        <!-- ======= Contact Section ======= -->
        <section class="contact row white-bg" id="contact">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="info-wrap">
                        <div class="row contact-details">
                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="icofont-google-map"></i>
                                    <h4 class="primary-text product-header-font-size text-left mb-2">Location:</h4>
                                    <p class="letter-spacing text-justify font-family-sans-serif pb-2 text-gray">30, Darshan Industrial Park, Singarva Road,<br> Kathwada GIDC, Ahmedabad - 382430,<br> Gujarat, India</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="icofont-envelope"></i>
                                    <h4 class="primary-text product-header-font-size text-left mb-2">Email:</h4>
                                    <p class="letter-spacing text-justify font-family-sans-serif pb-2 text-gray"><a class="letter-spacing text-justify font-family-sans-serif pb-2 text-gray hover-mail" href="mailto:sales@microfluidprocess.com">sales@microfluidprocess.com</a></p>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="info-box">
                                    <i class="icofont-phone"></i>
                                    <h4 class="primary-text product-header-font-size text-left mb-2">Call:</h4>
                                    <p class="letter-spacing text-justify font-family-sans-serif pb-2 text-gray">+91 70168 65019<br>Parth Patel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 map-section">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d918.0252235723684!2d72.68446002916806!3d23.02006739905966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7c18885d95e2866!2zMjPCsDAxJzEyLjIiTiA3MsKwNDEnMDYuMCJF!5e0!3m2!1sen!2sin!4v1668525859982!5m2!1sen!2sin" style="border:0; width: 100%; height: 300px;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="container">
                <div class="row mt-5 justify-content-center contact-form">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2 class="primary-text header-font-size">Contact Us</h2>
                        </div>
                        <form method="POST" action="{{ route('contact_add') }}" enctype="multipart/form-data" id="contactForm" class="contactForm mb-5">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-4">
                                    <input type="text" name="contact[name]" class="form-control" value="{{ old('contact.name') }}" placeholder="Your Name*" />
                                    @error('contact.name')
                                    <div class="text-red text-10 is-invalid">{{ $errors->first('contact.name') }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-4">
                                    <input type="text" name="contact[email]" value="{{ old('contact.email') }}" class="form-control" placeholder="Your Email*" />
                                    @error('contact.email')
                                    <div class="text-red text-10 is-invalid">{{ $errors->first('contact.email') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 form-group mb-4">
                                    <select class="custom-select country_code" name="contact[country_code]">
                                        <option value="">ISD Code</option>
                                        @foreach($country_code as $value)
                                        <option value="{{ $value->isd_code }}" {{ (old("contact.country_code") == $value->isd_code ? "selected":"") }}>{{ $value->isd_code }}</option>
                                        @endforeach
                                    </select>
                                    @error('contact.country_code')
                                    <div class="text-red text-10 is-invalid">{{ $errors->first('contact.country_code') }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group mb-4">
                                    <input type="text" name="contact[contact_no]" class="form-control" value="{{ old('contact.contact_no') }}" placeholder="Your Contact Number*" />
                                    @error('contact.contact_no')
                                    <div class="text-red text-10 is-invalid">{{ $errors->first('contact.contact_no') }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-4">
                                    <input type="text" name="contact[company_name]" value="{{ old('contact.company_name') }}" class="form-control" placeholder="Your Company Name*" />
                                    @error('contact.company_name')
                                    <div class="text-red text-10 is-invalid">{{ $errors->first('contact.company_name') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-4">
                                    <input class="form-control" type="file" id="attachment" name="contact[attachment]">
                                    @error('contact.attachment')
                                    <div class=" text-red text-10 is-invalid">{{ $errors->first('contact.attachment') }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-4">
                                    <textarea class="form-control" name="contact[message]" id="message" cols="30" rows="4" placeholder="Write your Message Here*">{{ old('contact.message') }}</textarea>
                                    @error('contact.message')
                                    <div class="text-red text-10 is-invalid">{{ $errors->first('contact.message') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center mt-4"><button type="submit" class="btn btn-primary primary-text rounded-0 py-2 px-4 submit_inquiry">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->
        @if ($errors->any())
        <script>
            document.querySelector('.is-invalid').scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        </script>
        @endif
    </main><!-- End #main -->
</x-app-layout>