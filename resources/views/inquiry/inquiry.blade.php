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
            <table class="center">
                <tbody>
                    <form method="post" action="/blogs/add" enctype="multipart/form-data">
                        @csrf
                        <table>
                            <tbody>
                                <tr>
                                    <td><label>Name:</label></td>
                                    <td><input type="text" name="name" value="{{ old('name') }}" />
                                        @error('name')
                                        <div class="text-red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Email:</label></td>
                                    <td><input type="text" name="email" value="{{ old('email') }}" />
                                        @error('email')
                                        <div class="text-red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Mobile No:</label></td>
                                    <td><input type="text" name="phone" value="{{ old('phone') }}" />
                                        @error('phone')
                                        <div class="text-red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Company Name:</label></td>
                                    <td><input type="text" name="company_name" value="{{ old('company_name') }}" />
                                        @error('company_name')
                                        <div class="text-red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Company Address:</label></td>
                                    <td><input type="text" name="company_address" value="{{ old('company_address') }}" />
                                        @error('company_address')
                                        <div class="text-red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Company Address:</label></td>
                                    <td><input type="text" name="postal_code" value="{{ old('postal_code') }}" />
                                        @error('postal_code')
                                        <div class="text-red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>City:</label></td>
                                    <td><input type="text" name="city" value="{{ old('city') }}" />
                                        @error('city')
                                        <div class="text-red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>State:</label></td>
                                    <td>
                                        <select name="state_id">
                                            <option value="">Select a State</option>
                                            @foreach($state as $value)
                                            <option value="{{ $value->id }}" {{ (old("state_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Country:</label></td>
                                    <td>
                                        <select name="country_id">
                                            <option value="">Select a Country</option>
                                            @foreach($country as $value)
                                            <option value="{{ $value->id }}" {{ (old("country_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Website:</label></td>
                                    <td><input type="text" name="website" value="{{ old('website') }}" />
                                        @error('website')
                                        <div class="text-red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="message">Message</label>
                                    </td>
                                    <td>
                                        <textarea name="message" rows="5">{{ old('message') }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Attachment:</label></td>
                                    <td><input type="file" name="attachment" value="" />
                                        @error('attachment')
                                        <div class="text-red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;">
                                        <button type="submit" class="btn btn-primary-color">Submit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </tbody>
            </table>

        </section><!-- End Inquiry Section -->
    </main><!-- End #main -->
</x-app-layout>