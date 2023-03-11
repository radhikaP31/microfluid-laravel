<x-app-layout>
    <x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
        {{ __('Inquiry | Microfluid Process Equipment') }}
    </x-slot>

    <!--     @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block container mb-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif -->

    {{ Breadcrumbs::render('inquiry') }}
    <main id="main">
        <!-- ======= Inquiry Section ======= -->
        <section class="container inquiry_form container-fluid" id="inquiry_form">
            <div class="row align-items-stretch contact-wrap">
                <div class="col-md-12">
                    <div class="form h-100">
                        <h2 class="primary-text header-font-size mb-3">Please describe your requirements. <br> Our Team will connect you shortly!!<br></h2>
                        <form method="post" action="{{ route('inquiry_add') }}" enctype="multipart/form-data" id="contactForm" class="contactForm mb-5">
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
                                <div class="col-md-6 form-group mb-3">
                                    <label for="phone" class="col-form-label">Mobile No <span class="text-red">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Your Mobile Number" />
                                    @error('phone')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                    <input type="checkbox" name="is_whatsapp_no" value="yes" />
                                    <label for="" class="col-form-label">Is Whatsapp Number?</label>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="company_name" class="col-form-label">Company Name <span class="text-red">*</span></label>
                                    <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control" placeholder="Your Company Name" />
                                    @error('company_name')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="company_address" class="col-form-label">Company Address </label>
                                    <input class="form-control" name="company_address" id="company_address" value="{{ old('company_address') }}" placeholder="Your Company Address" />
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label">Website </label>
                                    <input type="text" name="website" value="{{ old('website') }}" class="form-control" placeholder="Your Website Link" />
                                    @error('website')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="country_id" class="col-form-label">Country <span class="text-red">*</span></label>
                                    <select class="custom-select country_id" name="country_id" id="country_id" onchange="selectState(this.value)">
                                        <option value="">Select a Country</option>
                                        @foreach($country as $value)
                                        <option value="{{ $value->id }}" {{ (old("country_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="state_id" class="col-form-label">State <span class="text-red">*</span></label>
                                    <select class="custom-select state_id" name="state_id" id="state_id">
                                        <option value="">Select a State</option>
                                        @foreach($state as $value)
                                        <option value="{{ $value->id }}" {{ (old("state_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="city" class="col-form-label">City <span class="text-red">*</span></label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}" placeholder="Your City Name" />
                                    @error('city')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="post_code" class="col-form-label">Post Code <span class="text-red">*</span></label>
                                    <input type="text" name="post_code" class="form-control" value="{{ old('post_code') }}" placeholder="Your Post Code" />
                                    @error('post_code')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="attachment" class="col-form-label">Attachment </label>
                                    <input class="form-control" type="file" id="attachment" name="attachment">
                                    @error('attachment')
                                    <div class=" text-red text-10">{{ $message }}
                                    </div>
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
                            <div class="row mt-3">
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-primary font-16 primary-text submit_inquiry">Send Inquiry</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End Inquiry Section -->
    </main><!-- End #main -->
</x-app-layout>
<script>
    function selectState(countryId) {
        $.ajax({
            type: "POST",
            url: "/inquiry/selectState/" + countryId,
            data: {
                countryId: countryId,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $(".state_id").html("<option>Please Wait...</option>")
                $(".state_id").prop("disabled", true)
            },
            success: function(response) {
                $(".state_id").html(response)
                $(".state_id").prop("disabled", false)
            }
        });
    }
</script>