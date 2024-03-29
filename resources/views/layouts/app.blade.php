@props([
'metaname' => 'Microfluid',
'meta-content' => 'Microfluid Process Equipment',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <meta content="@yield('metadesc')" name="description">
    <meta content="@yield('metakeyword')" name="keywords">
    <meta content="Microfluid Process Equipment" name="author">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://microfluidprocess.com/">
    <link rel="shortlink" href="https://microfluidprocess.com/">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('images/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    @include('layouts.header')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.headerscroll')
        <!-- Page Content -->
        {{ $slot }}
    </div>
    @include('layouts.footer')
</body>

</html>