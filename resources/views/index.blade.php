<x-app-layout>
	<x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
            {{ __('Home | Microfluid Process Equipment') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block  container mb-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="container row col-md-12">
        
    </div>

</x-app-layout>