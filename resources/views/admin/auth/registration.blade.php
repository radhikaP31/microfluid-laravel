<x-admin-layout>
    <x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
        {{ __('Admin | Microfluid Process Equipment') }}
    </x-slot>

    <main id="main">
        <section class="container contact container-fluid" id="contact">
            <div class="container">
                <div class="col-md-12 content">
                    <div class="section-title text-center">
                        <h2 class="primary-text header-font-size">Login</strong></h2>
                    </div>
                    <div class=" col-lg-10">
                        <form method="post" action="{{ route('register.custom') }}" enctype="multipart/form-data" id="contactForm" class="contactForm mb-5">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="name" class="col-form-label">Name <span class="text-red">*</span></span></label>
                                    <input type="text" placeholder="Name" id="name" class="form-control" name="name" required autofocus>
                                    @error('name')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="username" class="col-form-label">Username <span class="text-red">*</span></span></label>
                                    <input type="text" placeholder="Username" id="username" class="form-control" name="username" required autofocus>
                                    @error('username')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="email" class="col-form-label">Email <span class="text-red">*</span></span></label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Your Email" />
                                    @error('email')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="password" class="col-form-label">Password<span class="text-red">*</span></label>
                                    <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Your Password" />
                                    @error('password')
                                    <div class="text-red text-10">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center"><button type="submit" class="btn btn-primary primary-text rounded-0 py-2 px-4 submit_inquiry">Login</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->
    </main><!-- End #main -->
</x-admiin-layout>