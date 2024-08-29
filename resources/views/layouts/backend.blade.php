<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Admin">
        <meta name="author" content="Admin">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="">
        
        <title>{{ config('app.name') }}</title>
        
        <!-- ============================================================== -->
        @include('layouts.front_layout.css')
        @yield('css')
        <style>
        </style>
    </head>
    <body class="responsive">

        @include('layouts/front_layout.sidebar')
        @include('layouts/front_layout.header')


        @yield('content')


        @include('layouts/front_layout.footer')
        <!-- ============================================================== -->
        <!-- All SCRIPTS ANS JS LINKS IN BELOW FILE -->
        <!-- ============================================================== -->
        @include('layouts/front_layout.scripts')
        @yield('js')

    </body>
</html>