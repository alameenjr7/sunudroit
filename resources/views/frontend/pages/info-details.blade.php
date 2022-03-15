@extends('frontend.layouts.master')

@section('content')

	<!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset(get_setting('background_header'))}})">
    	<div class="auto-container">
			{{-- <h1>Corporate Law</h1> --}}
			<ul class="page-breadcrumb">
				<li><a href="{{route('home')}}">Accueil</a></li>
				<li>Infos</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- Services Detail Section -->
	<section class="services-detail-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="image">
                    <div class="lower-content">
                        <h2>{{$info_details->title}}</h2>
                        <p>{!! html_entity_decode($info_details->description) !!}</p>
                        <div class="row clearfix">
                            
                        </div>
                        <div class="btn-box">
                            <a href="{{route('calcul.droit')}}" class="theme-btn btn-style-two"><span class="txt">Calculer vos droits <i class="arrow flaticon-right"></i></span></a>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Services Detail Section -->

@endsection