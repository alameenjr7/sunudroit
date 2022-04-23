@extends('frontend.layouts.master')

@section('content')

	<!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset(get_setting('background_header'))}})">
    	<div class="auto-container">
			<h1>Informations pratiques</h1>
			{{-- <ul class="page-breadcrumb">
				<li><a href="{{route('home')}}">home</a></li>
				<li>Services</li>
			</ul> --}}
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
								<img src="{{asset('frontend/assets/img/droit1.jpeg')}}" alt="" />
							</div>
						</div>
					</div>

					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							{{-- <div class="sec-title">
								<h2>CE QUE NOUS <br> VOUS OFFRONS</h2>
								<div class="text">Consciente de la complexité du droit et de la difficultés à accéder à certains professionnels
									du droit, Sunudroit.Tech s’est donnée pour mission de faciliter l’accès au droit par la
									fourniture d’outils et d’informations juridiques simples et accessibles à tous.</div>
							</div> --}}
							<div class="row clearfix">
								<div class="column col-lg-6 col-md-6 col-sm-6">
									<ul class="list-style-one">
										<li>Délégation de puissance paternelle</li>
										<li>Jugement d’hérédité</li>
										<li>Rectificatif d’acte d’état civil</li>
										<li>Administration légale</li>
									</ul>
								</div>
								<div class="column col-lg-6 col-md-6 col-sm-6">
									<ul class="list-style-one">
										<li>Homologation de partage</li>
										<li>Divorce contentieux</li>
										<li>Divorce amiable</li>
										<li>Annulation d’acte d’état civil etc.</li>
									</ul>
								</div>
							</div>
							<div class="btns-box">
								<a href="{{route('calcul.droit')}}" class="theme-btn btn-style-two"><span class="txt">Calculer vos droits <i class="arrow flaticon-right"></i></span></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Welcome Section -->

	<!-- Practice Section -->
	<section class="practice-section" style="background-image: url({{asset('frontend/assets/imd/background/pattern-2.png')}})">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				{{-- <h2>NOS DOMAINES DE PRATIQUE JURIDIQUE</h2> --}}
			</div>
			<div class="inner-container">
				<div class="clearfix">
					<!-- Practice Block -->
					@if (count($infos)>0)
						@foreach ($infos as $info)
							<div class="practice-block col-lg-3 col-md-6 col-sm-12">
									<div class="inner-box">
										{{-- <div class="icon {{$info->icons}}"></div> --}}
										<h5 style="font-size: 16px;"><a href="{{route('info.detail',$info->slug)}}">{{$info->title}}</a></h5>
										{{-- <div class="text">
											<p>{!! html_entity_decode(\Illuminate\Support\Str::words($info->description,2)) !!}</p>
										</div> --}}
										<a class="arrow flaticon-right-arrow-3" href="{{route('info.detail',$info->slug)}}"></a>
									</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>

	</section>
    <div style="top: 50px">
        {{ $infos->appends($_GET)->links('vendor.pagination.custom') }}
    </div>
	<!-- End Practice Section -->

	<!-- Facts Section three -->
    <section class="facts-section-three" style="background-image: url({{asset('frontend/assets/img/just.jpg')}});">

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
