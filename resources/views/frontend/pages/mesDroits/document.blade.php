@extends('frontend.layouts.master')

@section('content')

	<!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/1.jpg')}})">
    	<div class="auto-container">
			<h1>Mes documents juridiques</h1>
			<ul class="page-breadcrumb">
				<li><a href="{{route('home')}}">Accueil</a></li>
				<li>PDF</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
	<!-- Case Study Section -->
	<section class="case-study-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="row clearfix">
					
					<!-- Case Block -->
					@if (count($documentPDF)>0)
                        @foreach ($documentPDF as $data)
                            <div class="case-block col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box"  style="background-color: rgba(241, 241, 241, 0.952);">
                                    <div class="image">
                                        <div class="tag">{{$data->conditions}}</div>
                                        <img src="{{asset('frontend/assets/images/_pdf.webp')}}" alt="" style="height: 150px" />
                                    </div>
                                    <div class="lower-content">
                                        <h4>{{ucfirst($data->title)}}</h4>
                                        <a href="{{route('voir.pdf',$data->slug)}}" class="theme-btn btn-style-three"><span class="txt">Voir <i class="fa fa-eye "></i></span></a>
                                        <a href="{{route('download.pdf',$data->id)}}" class="theme-btn btn-style-two"><span class="txt">Telecharger <i class="fa fa-download"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
				
					
				</div>
			</div>
		</div>
	</section>
	<!-- End Case Study Section -->

@endsection

