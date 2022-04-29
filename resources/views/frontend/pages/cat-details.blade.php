@extends('frontend.layouts.master')

@section('title')
    <title>Actualités sur le droit en général - SunuDroit</title>
@endsection

@section('content')

	<!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset(get_setting('background_header'))}})">
    	<div class="auto-container">
			{{-- <h1>Corporate Law</h1> --}}
			<ul class="page-breadcrumb">
				<li><a href="{{route('home')}}">Accueil</a></li>
				<li>Mes droits</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- Services Detail Section -->
	<section class="services-detail-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="image">
					<img src="{{asset($cat_details->photo)}}" alt="" style="max-width: 1170px; max-height: 450px;"/>
				</div>
				<div class="lower-content">
					<h2>{{$cat_details->title}}</h2>
					<p>{!! html_entity_decode($cat_details->description) !!}</p>
					<div class="row clearfix">

					</div>
					<div class="btn-box">
						<a href="{{route('calcul.droit')}}" class="theme-btn btn-style-two"><span class="txt">Calculer vos droits <i class="arrow flaticon-right"></i></span></a>
					</div>

					<!-- Consult Form -->
					{{-- <div class="consult-form">
						<div class="sec-title">
							<h2>Consult Now</h2>
						</div>
						<form method="post" action="contact.html">
							<div class="row clearfix">

								<div class="col-lg-4 col-md-6 col-sm-12 form-group">
									<input type="text" name="username" placeholder="Name" required>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-12 form-group">
									<input type="email" name="email" placeholder="Email" required>
								</div>

								<div class="col-lg-4 col-md-12 col-sm-12 form-group">
									<input type="text" name="phone" placeholder="Phone" required>
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<textarea name="message" placeholder="Message"></textarea>
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
									<button class="theme-btn btn-style-two" type="submit" name="submit-form"><span class="txt">Submit now <i class="arrow flaticon-right"></i></span></button>
								</div>

							</div>
						</form>
						<!-- End Consult Form -->
					</div> --}}

				</div>
			</div>
		</div>
	</section>
	<!-- End Services Detail Section -->

	<!-- Practice Section -->
	{{-- <section class="practice-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>Our LEGAL PRACTICE Areas</h2>
			</div>
			<div class="inner-container">
				<div class="clearfix">

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-car-1"></div>
							<h5><a href="corporate_law.html">Car Accident</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-briefcase"></div>
							<h5><a href="corporate_law.html">Business LAw</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-handcuffs-1"></div>
							<h5><a href="corporate_law.html">Criminal Law</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-save-money"></div>
							<h5><a href="corporate_law.html">Child Support</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-injury"></div>
							<h5><a href="corporate_law.html">Personal Injury</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-law"></div>
							<h5><a href="corporate_law.html">Education LAw</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-balance"></div>
							<h5><a href="corporate_law.html">Divorce Law</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-notebook"></div>
							<h5><a href="corporate_law.html">TAX LAW</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section> --}}
	<!-- End Practice Section -->

	<!-- Clients Section -->
	{{-- <section class="clients-section style-two">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>TRUSTED COMPANIES</h2>
				<div class="text">Nemo enim ipsam voluptatem quia voluptas sit asper aut odit aut fugit, sed quia consequuntur magni doloreos <br> qui ratione voluptatem sequi nesciunt aorro ruisea</div>
			</div>
			<div class="inner-container">
				<div class="sponsors-outer">
					<!--Sponsors Carousel-->
					<ul class="sponsors-carousel owl-carousel owl-theme">
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('frontend/assets/images/clients/1.png')}}" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('frontend/assets/images/clients/2.png')}}" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('frontend/assets/images/clients/3.png')}}" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('frontend/assets/images/clients/4.png')}}" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('frontend/assets/images/clients/1.png')}}" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('frontend/assets/images/clients/2.png')}}" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('frontend/assets/images/clients/3.png')}}" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('frontend/assets/images/clients/4.png')}}" alt=""></a></figure></li>
					</ul>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- End Clients Section -->

@endsection
