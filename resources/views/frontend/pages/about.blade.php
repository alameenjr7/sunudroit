@extends('frontend.layouts.master')

@section('content')

<!-- Page Title -->
<section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/1.jpg')}})">
    <div class="auto-container">
        <h1>Qui sommes-nous?</h1>
        <ul class="page-breadcrumb">
            <li><a href="index.html">Accueil</a></li>
            <li>A propos de nous</li>
        </ul>
    </div>
</section>
<!-- End Page Title -->

<!-- Case Section -->
<section class="case-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="clearfix">

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <img src="{{('frontend/assets/images/resource/case-2.jpg')}}" alt="" />
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <h2>We specialise in <br> All Type of cases</h2>
                            <div class="text">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et volutate repudiandae sint et molestiae non recusandae earum  rerum hic tenetur a sapiente delectus ut aut reiciendis  voluptatibus maiores alias consequatur aut nerfereni doloribus asperiores repellat.</div>
                        </div>
                        <div class="text-box">
                            Nam libero tempore, cum soluta nobis est eligenioptio cumque nihil impedit quo minus id quod maxplaceat facere possimus, omnis voluptas.
                            <a href="corporate_law.html" class="arrow flaticon-right"></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End Welcome Section -->

<!-- Services Section Two -->
<section class="services-section-two style-two">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>What Make Us Unique</h2>
        </div>
        <div class="row clearfix">

            <!-- Services Block Two -->
            <div class="services-block-two col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="icon flaticon-auction"></div>
                    <h5><a href="corporate_law.html">Legal Services</a></h5>
                    <div class="text">Quis autem velo eum iure rerehen derit rui inea votasuam nihil molestia conseuatur vel illum</div>
                    <a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
                </div>
            </div>

            <!-- Services Block Two -->
            <div class="services-block-two col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="icon flaticon-law"></div>
                    <h5><a href="corporate_law.html">Great Results</a></h5>
                    <div class="text">Quis autem velo eum iure rerehen derit rui inea votasuam nihil molestia conseuatur vel illum</div>
                    <a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
                </div>
            </div>

            <!-- Services Block Two -->
            <div class="services-block-two col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="icon flaticon-marketing"></div>
                    <h5><a href="corporate_law.html">Passionate People</a></h5>
                    <div class="text">Quis autem velo eum iure rerehen derit rui inea votasuam nihil molestia conseuatur vel illum</div>
                    <a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Services Section Two -->

<!-- Fluid Section Two -->
<section class="fluid-section-two">
    <div class="side-icon"><img src="{{('frontend/assets/images/icons/fluid-icon-1.png')}}" alt="" /></div>
    <div class="outer-container clearfix">

        <!-- Content Column -->
        <div class="content-column">
            <div class="inner-column">
                <!-- Sec Title -->
                <div class="sec-title light">
                    <h2>Why Choose Us</h2>
                    <div class="text">Tonam rem aperiam, eaque ipsa quae ab illo inventoe veritatis et quasi architecto beatae vitae dicta sunt explicabo exercitationem ullam corporis.</div>
                </div>
                <!-- Counter Boxed -->
                <div class="counter-boxed">
                    <div class="fact-counter style-two">
                        <div class="row clearfix">

                            <!-- Column -->
                            {{-- <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon flaticon-briefcase"></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="2500" data-stop="250">0</span><sup>+</sup>
                                        </div>
                                        <h6 class="counter-title">Business Partners</h6>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Column -->
                            {{-- <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                <div class="inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon flaticon-balance"></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="180">0</span><sup>+</sup>
                                        </div>
                                        <h6 class="counter-title">Cases Done</h6>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Column -->
                            {{-- <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                <div class="inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon flaticon-marketing"></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="350">0</span><sup>+</sup>
                                        </div>
                                        <h6 class="counter-title">Happy Clients</h6>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Column -->
                            {{-- <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                <div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon flaticon-trophy-2"></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="150">0</span><sup>+</sup>
                                        </div>
                                        <h6 class="counter-title">Awards Win</h6>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Image Column -->
        <div class="image-column" style="background-image:url({{asset('frontend/assets/images/resource/image-1.jpg')}})">
            <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image video-box"><span class="fa fa-play"><i class="ripple"></i></span></a>
            <figure class="image-box"><img src="{{asset('frontend/assets/images/resource/image-1.jpg')}}" alt=""></figure>
        </div>

    </div>
</section>
<!-- End Fluid Section Two -->
<div class="spacer"></div>
	<!-- Team Section -->
	{{-- @if (count($equipePro)>0)
		<section class="team-section">
			<div class="auto-container">
				<!-- Sec Title -->
				<div class="sec-title centered">
					<h2>Notre Equipe Professionnelle</h2>
				</div>
				<div class="row clearfix">

					<!-- Team Block -->
					@foreach ($equipePro as $equipe)
						<div class="inner-container team-block col-lg-3 col-md-6 col-sm-12">
							<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
								<div class="image">
									<img src="{{asset($equipe->photo)}}" alt="" />
								</div>
								<div class="lower-box">
									<h5><a href="{{route('corporate')}}">{{$equipe->prenom}} {{$equipe->nom}}</a></h5>
									<div class="designation">{{$equipe->poste}}</div>
									<a class="arrow flaticon-right-arrow-3" href="{{route('corporate')}}"></a>
								</div>
							</div>
						</div>
					@endforeach

				</div>
			</div>
		</section>		
	@endif --}}
	<!-- End Team Section -->

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
