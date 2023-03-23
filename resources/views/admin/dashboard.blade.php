<x-admin-layout>
    <x-slot name="title">
        {{ __('Admin Dashboard | Microfluid Process Equipment') }}
    </x-slot>
    <x-slot name="metaname">
        {{ __('My Title') }}
    </x-slot>
    <x-slot name="metadesc">
        {{ __('My Description') }}
    </x-slot>
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <form method="post" action="{{ route('common_type_add') }}" enctype="multipart/form-data" class="mb-5">
                <x-dynamic-form-field type="text" name="username" label="Username" value="{{ old('username') }}" placeholder="Your Name" />
                <x-dynamic-form-field type="email" name="email" label="Email Address" value="{{ old('email') }}" placeholder="Your Email" />
            </form>
        </div>
    </main>
</x-admin-layout>