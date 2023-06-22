<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
  

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Wizard CSS -->
    <link href="{{ URL::asset('css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- RTL/LTR CSS -->
    @if (App::getLocale() == 'fr')
        <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
    @else
        <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
    @endif

    <!-- Additional CSS -->
    @yield('css')
</head>
<body>
    <!-- Content goes here -->
</body>
</html>
