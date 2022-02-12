@extends('frontend.layouts.master')

@section('content')

	<!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/1.jpg')}})">
    	<div class="auto-container">
			<h1>Informations pratiques</h1>
			<ul class="page-breadcrumb">
				<li><a href="{{route('home')}}">home</a></li>
				<li>Services</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- Welcome Section -->
	<section class="welcome-section style-two">
		<div class="auto-container">
			<div class="inner-container">
				<div class="clearfix">

					<!-- Image Column -->
					<div class="image-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="image">
								<img src="{{asset('frontend/assets/images/resource/service-3.jpg')}}" alt="" />
							</div>
						</div>
					</div>

					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							<div class="sec-title">
								<h2>CE QUE NOUS <br> VOUS OFFRONS</h2>
								<div class="text">Duis aute irure dolor in reprehenderit in volutate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
							</div>
							<div class="row clearfix">
								<div class="column col-lg-6 col-md-6 col-sm-6">
									<ul class="list-style-one">
										<li>Velit esse quam nihilumi</li>
										<li>Qui dolorem eum fugiat</li>
										<li>Aspernatur aut odit aut</li>
										<li>Ratione voluptatem sea</li>
									</ul>
								</div>
								<div class="column col-lg-6 col-md-6 col-sm-6">
									<ul class="list-style-one">
										<li>Nostrum exercitationem</li>
										<li>Reprehenderit qui nulla</li>
										<li>Tempora incidunt utao</li>
										<li>Nihil molestiae conseua</li>
									</ul>
								</div>
							</div>
							<div class="btns-box">
								<a href="{{route('home')}}" class="theme-btn btn-style-two"><span class="txt">Free Consultation <i class="arrow flaticon-right"></i></span></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Welcome Section -->

	<!-- Practice Section -->
	<section class="practice-section" style="background-image: url({{asset('frontend/assets/images/background/pattern-2.png')}})">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>NOS DOMAINES DE PRATIQUE JURIDIQUE</h2>
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
	</section>
	<!-- End Practice Section -->

	<!-- Facts Section three -->
    <section class="facts-section-three" style="background-image: url({{asset('frontend/assets/images/background/1.jpg')}});">

        <div class="auto-container">
            <div class="fact-counter-style-three">
                <div class="row">
                    {{-- <!--Column-->
                    <div class="column counter-column col-lg-4 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon"><span class="flaticon-briefcase"></span></div>
                                <div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3000" data-stop="245">0</span><sup>+</sup>
                                    </div>
                                    <h4>Business Partners </h4>
                                    <div class="text">Indignation & dislike mens who <br> beguiled demoralized.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Column-->
                    <div class="column counter-column col-lg-4 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon"><span class="flaticon-balance"></span></div>
                                <div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3000" data-stop="1879">0</span><sup>+</sup>
                                    </div>
                                    <h4>Cases Done</h4>
                                    <div class="text">Desire that they cannot foresee <br> the pain and trouble.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Column-->
                    <div class="column counter-column col-lg-4 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon"><span class="flaticon-trophy-2"></span></div>
                                <div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3000" data-stop="350">0</span><sup>+</sup>
                                    </div>
                                    <h4>Awards Win</h4>
                                    <div class="text">These cases are perfect simple <br> & easy to distinguish.</div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>



	<!-- Clients Section -->
	{{-- @if (count($brandCompany)>0)		
		<section class="clients-section">
			<div class="auto-container">
				<!-- Sec Title -->
				<div class="sec-title centered">
					<h2>ENTREPRISES DE CONFIANCE</h2>
					<div class="text">Nemo enim ipsam voluptatem quia voluptas sit asper aut odit aut fugit, sed quia consequuntur magni doloreos <br> qui ratione voluptatem sequi nesciunt aorro ruisea</div>
				</div>
				<div class="inner-container">
					<div class="sponsors-outer">
						<!--Sponsors Carousel-->
						<ul class="sponsors-carousel owl-carousel owl-theme">
							@foreach ($brandCompany as $brand)
								<li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset($brand->photo)}}" alt="{{$brand->title}}"></a></figure></li>								
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</section>
	@endif --}}
	<!-- End Clients Section -->

@endsection
