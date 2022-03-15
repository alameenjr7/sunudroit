@extends('frontend.layouts.master')

@section('content')

<!-- Page Title -->
<section class="page-title style-two" style="background-image:url({{asset(get_setting('background_header'))}})">
    <div class="auto-container">
        <h1>404</h1>
        <ul class="page-breadcrumb">
            <li><a href="{{route('home')}}">Accueil</a></li>
            <li>404</li>
        </ul>
        <div>
            <br>
            <h5 class="mb-3">Oops! Page Not Found</h5>
            <hr>
            <br>
            <p>Sorry! The page you looking for is not found. Make sure that you have typed the currect URL</p>
        </div>
    </div>
</section>
<!-- End Page Title -->

@endsection