@extends('frontend.layouts.master')

@section('content')
    <!-- Banner Section -->
	@if (count($banners)>0)	
		<section class="banner-section">
			<!-- Social Nav -->
			<ul class="social-nav">
				<li class="facebook"><a href="#"><span class="fa fa-facebook-f"></span></a></li>
				<li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
				<li class="linkedin"><a href="#"><span class="fa fa-linkedin"></span></a></li>
				<li class="linkedin"><a href="#"><span class="fa fa-instagram"></span></a></li>
				<li class="linkedin"><a href="#"><span class="fa fa-youtube"></span></a></li>
			</ul>
			<div class="main-slider-carousel owl-carousel owl-theme">
				@foreach ($banners as $banner)
					<div class="slide" style="background-image: url({{asset($banner->photo)}})">
						<div class="auto-container">

							<!-- Content Column -->
							<div class="content-column">
								<div class="inner-column">
									<div class="title">{{$banner->title}}</div>
									<h1>{{$banner->subtitle}} <br> {{$banner->slug}}</h1>
									<div class="text">{{$banner->description}}</div>
									<div class="btns-box">
										<a href="contact.html" class="theme-btn btn-style-one"><span class="txt">Consultation Gratuite <i class="arrow flaticon-right"></i></span></a>
									</div>
								</div>
							</div>

						</div>
					</div>
				@endforeach
			</div>

		</section>
	@endif
	<!-- End Banner Section -->

	<!-- Services Section -->
	<section class="services-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="row clearfix">

					<!-- Services Block -->
					<div class="services-block col-lg-6 col-md-12 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-file"></div>
								<h4><a href="{{route('corporate')}}">Droit des sociétés</a></h4>
								<div class="text">Quis autem velo eum iure reprehenderit rui inea votasuam nihil molestiae conseuatur vel illum eius modi temora incidunt ut labore.</div>
							</div>
							<a href="{{route('corporate')}}" class="arrow flaticon-right"></a>
						</div>
					</div>

					<!-- Services Block -->
					<div class="services-block col-lg-6 col-md-12 col-sm-12">
						<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-file-1"></div>
								<h4><a href="{{route('corporate')}}">Droit immobilier</a></h4>
								<div class="text">Quis autem velo eum iure reprehenderit rui inea votasuam nihil molestiae conseuatur vel illum eius modi temora incidunt ut labore.</div>
							</div>
							<a href="{{route('corporate')}}" class="arrow flaticon-right"></a>
						</div>
					</div>

					<!-- Services Block -->
					<div class="services-block col-lg-6 col-md-12 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-umbrella-1"></div>
								<h4><a href="{{route('corporate')}}">Droit des assurances</a></h4>
								<div class="text">Quis autem velo eum iure reprehenderit rui inea votasuam nihil molestiae conseuatur vel illum eius modi temora incidunt ut labore.</div>
							</div>
							<a href="{{route('corporate')}}" class="arrow flaticon-right"></a>
						</div>
					</div>

					<!-- Services Block -->
					<div class="services-block col-lg-6 col-md-12 col-sm-12">
						<div class="inner-box wow fadeInRight" data-wow-delay="150ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-group"></div>
								<h4><a href="{{route('corporate')}}">Droit de la famille</a></h4>
								<div class="text">Quis autem velo eum iure reprehenderit rui inea votasuam nihil molestiae conseuatur vel illum eius modi temora incidunt ut labore.</div>
							</div>
							<a href="{{route('corporate')}}" class="arrow flaticon-right"></a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Services Section -->

	<!-- Welcome Section -->
	<section class="welcome-section" style="background-image: url({{asset('frontend/assets/images/background/pattern-2.png)')}})">
		<div class="auto-container">
			<div class="inner-container">
				<div class="clearfix">

					<!-- Image Column -->
					<div class="image-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="image titlt" data-tilt data-tilt-max="2">
								<img src="{{asset('frontend/assets/images/resource/video-img.jpg')}}" alt="" />
							</div>
							<div class="case-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
								1500<sup>+</sup>
								<span>Cas <br> Réussis</span>
							</div>
						</div>
					</div>

					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							<div class="sec-title">
								<h2>Bienvenue au cabinet d'avocats Counsel</h2>
								<div class="text">Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut  sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.</div>
							</div>
							<ul class="list-style-one">
								<li>Velit esse quam nihil molestiae consequatur, velillu. </li>
								<li>Qui dolorem eum fugiat quo voluptas nulla pariatur. </li>
								<li>Aspernatur aut odit aut fugit commodo luis cursus.</li>
								<li>Ratione voluptatem sequi nesciunt nerue porro.</li>
							</ul>
							<div class="btns-box">
								<a href="contact.html" class="theme-btn btn-style-two"><span class="txt">Obtenez un devis <i class="arrow flaticon-right"></i></span></a>
								<a href="contact.html" class="theme-btn btn-style-three"><span class="txt">Voir plus <i class="arrow flaticon-right"></i></span></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Welcome Section -->

	<!-- Counter Section -->
	<section class="counter-section">
		<div class="image-layer" style="background-image: url({{asset('frontend/assets/images/background/1.jpg)')}})"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title light centered">
				<h2>20 ans d'expérience dans le domaine des affaires juridiques</h2>
				<div class="text">Renrehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur vel illum <br> aui dolorem eum fugiat quo voluptas nulla pariatur</div>
			</div>

			<div class="fact-counter">
				<div class="row clearfix">

					<!-- Column -->
					<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
						<div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-briefcase"></div>
								<div class="count-outer count-box">
									<span class="count-text" data-speed="2500" data-stop="250">0</span><sup>+</sup>
								</div>
								<h6 class="counter-title">Partenaires d'Affaires</h6>
							</div>
						</div>
					</div>

					<!-- Column -->
					<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
						<div class="inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-balance"></div>
								<div class="count-outer count-box">
									<span class="count-text" data-speed="3000" data-stop="180">0</span><sup>+</sup>
								</div>
								<h6 class="counter-title">Cas Réglés</h6>
							</div>
						</div>
					</div>

					<!-- Column -->
					<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
						<div class="inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-marketing"></div>
								<div class="count-outer count-box">
									<span class="count-text" data-speed="3000" data-stop="350">0</span><sup>+</sup>
								</div>
								<h6 class="counter-title">Clients Heureux</h6>
							</div>
						</div>
					</div>

					<!-- Column -->
					<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
						<div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-trophy-2"></div>
								<div class="count-outer count-box">
									<span class="count-text" data-speed="3000" data-stop="150">0</span><sup>+</sup>
								</div>
								<h6 class="counter-title">Gagner des Récompenses</h6>
							</div>
						</div>
					</div>

				</div>
			</div>

			<!--Video Box-->
			<div class="video-boxed">
				<figure class="video-image">
					<img src="{{asset('frontend/assets/images/resource/video-img.jpg')}}" alt="">
				</figure>
				<a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image overlay-box"><span class="flaticon-play-arrow"><i class="ripple"></i></span></a>
			</div>

		</div>
	</section>
	<!-- End Counter Section -->

	<!-- Practice Section -->
	<section class="practice-section" style="background-image: url({{asset('frontend/assets/images/background/pattern-2.png')}})">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>Nos Domaines de PRATIQUE JURIDIQUE</h2>
			</div>
			<div class="inner-container">
				<div class="clearfix">

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-car-1"></div>
							<h5><a href="{{route('corporate')}}">Accident de voiture</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="{{route('corporate')}}"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-briefcase"></div>
							<h5><a href="{{route('corporate')}}">Droit des Affaires</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="{{route('corporate')}}"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-handcuffs-1"></div>
							<h5><a href="{{route('corporate')}}">Litige Civil</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="{{route('corporate')}}"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-save-money"></div>
							<h5><a href="{{route('corporate')}}">Assurance Défense</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="{{route('corporate')}}"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-injury"></div>
							<h5><a href="{{route('corporate')}}">Droit du Travail</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="{{route('corporate')}}"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-law"></div>
							<h5><a href="{{route('corporate')}}">Contentieux des Affaires</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="{{route('corporate')}}"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-balance"></div>
							<h5><a href="{{route('corporate')}}">Droit des Travailleurs</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="{{route('corporate')}}"></a>
						</div>
					</div>

					<!-- Practice Block -->
					<div class="practice-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon flaticon-notebook"></div>
							<h5><a href="{{route('corporate')}}">Droit de la Famille</a></h5>
							<div class="text">Quis autem velo eum iure suam nihil molestiae</div>
							<a class="arrow flaticon-right-arrow-3" href="{{route('corporate')}}"></a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Practice Section -->

	<!-- Fluid Section One -->
    <section class="fluid-section-one">
		<div class="side-icon"><img src="{{asset('frontend/assets/images/sunudroit-logo/logo-nobackground-500.png')}}" alt="" /></div>
    	<div class="outer-container clearfix">
        	<!-- Image Column -->
            <div class="image-column clearfix" style="background-image:url({{asset('frontend/assets/images/resource/image-1.jpg')}})">
            	<div class="inner-column">
					<div class="sec-title light">
						<h2>Questions fréquemment <br> posées</h2>
						<div class="text">Tonam rem aperiam, eaque ipsa quae ab illo inventoe veritatis et quasi architecto beatae vitae dicta sunt explicabo exercitationem ullam corporis.</div>
					</div>

					<!-- Accordian Box -->
					<ul class="accordion-box">

						<!-- Block -->
						<li class="accordion block active-block">
							<div class="acc-btn active"><div class="icon-outer"><span class="icon icon-plus flaticon-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div>Quis autem vel eum iure reprederit?</div>
							<div class="acc-content current">
								<div class="content">
									<div class="accordian-text">Dolor sit amet, consectetur, adipisci velit, sed quia non numuameius modi tempora incidunt ut labore et dolore magnam aliuam quaerat voluptatem.</div>
								</div>
							</div>
						</li>

						<!-- Block -->
						<li class="accordion block">
							<div class="acc-btn"><div class="icon-outer"><span class="icon icon-plus flaticon-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div>fugiat quo voluptas nulla pariatu?</div>
							<div class="acc-content">
								<div class="content">
									<div class="accordian-text">Dolor sit amet, consectetur, adipisci velit, sed quia non numuameius modi tempora incidunt ut labore et dolore magnam aliuam quaerat voluptatem.</div>
								</div>
							</div>
						</li>

						<!-- Block -->
						<li class="accordion block">
							<div class="acc-btn"><div class="icon-outer"><span class="icon icon-plus flaticon-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div>minima veniam, quis nostrum exerci?</div>
							<div class="acc-content">
								<div class="content">
									<div class="accordian-text">Dolor sit amet, consectetur, adipisci velit, sed quia non numuameius modi tempora incidunt ut labore et dolore magnam aliuam quaerat voluptatem.</div>
								</div>
							</div>
						</li>

					</ul>

				</div>
            </div>

        	<!-- Content Column -->
            <div class="content-column">
            	<div class="inner-column">
					<div class="sec-title">
						<h2>Obtenez une Consultation <br> Gratuite</h2>
					</div>

					<!-- Default Form -->
					<div class="default-form">
						<form method="post" action="contact.html">
							<div class="row clearfix">

								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<input type="text" name="username" placeholder="Name" required>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<input type="text" name="phone" placeholder="Phone" required>
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<select class="custom-select-box">
										<option>Zone de Pratique</option>
										<option>Area 01</option>
										<option>Area 02</option>
										<option>Area 03</option>
										<option>Area 04</option>
									</select>
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<textarea name="message" placeholder="Message"></textarea>
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<button class="theme-btn btn-style-two" type="submit" name="submit-form"><span class="txt">Soumettre maintenant <i class="arrow flaticon-right"></i></span></button>
								</div>

							</div>
						</form>
					</div>
					<!-- End Default Form -->

				</div>
			</div>
		</div>
	</section>
	<!-- Fluid Section One -->

	<!-- Team Section -->
	@if (count($equipePro)>0)
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
	@endif
	<!-- End Team Section -->

	<!-- Testimonail Section -->
	<section class="testimonial-section" style="background-image: url({{asset('frontend/assets/images/background/pattern-3.png')}})">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>Ce que nos clients ont dit</h2>
			</div>
			<div class="inner-container">
				<div class="single-item-carousel owl-carousel owl-theme">

					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="author-image">
								<img src="{{asset('frontend/assets/images/resource/author-1.png')}}" alt="" />
							</div>
							<span class="quote-icon flaticon-quote-1"></span>
							<div class="text">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil rentoa molestiae conseruatur vela illum qui dolorem eum fugiat ruo voluetas nulla ariatur minima veniam.</div>
							<div class="name">Kevin Peterson</div>
						</div>
					</div>

					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="author-image">
								<img src="{{asset('frontend/assets/images/resource/author-1.png')}}" alt="" />
							</div>
							<span class="quote-icon flaticon-quote-1"></span>
							<div class="text">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil rentoa molestiae conseruatur vela illum qui dolorem eum fugiat ruo voluetas nulla ariatur minima veniam.</div>
							<div class="name">Kevin Peterson</div>
						</div>
					</div>

					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="author-image">
								<img src="{{asset('frontend/assets/images/resource/author-1.png')}}" alt="" />
							</div>
							<span class="quote-icon flaticon-quote-1"></span>
							<div class="text">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil rentoa molestiae conseruatur vela illum qui dolorem eum fugiat ruo voluetas nulla ariatur minima veniam.</div>
							<div class="name">Kevin Peterson</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Testimonail Section -->

	<!-- Clients Section -->
	@if (count($brandCompany)>0)		
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
	@endif
	<!-- End Clients Section -->

	<!-- CTA Section -->
	<section class="cta-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="image">
					<img src="{{asset('frontend/assets/images/resource/cta.jpg')}}" alt="" />
				</div>
				<div class="content">
					<h2>Parlez avec nos <br> experts aujourd'hui!</h2>
					<a href="contact.html" class="theme-btn btn-style-two"><span class="txt">Obtenez un devis <i class="arrow flaticon-right"></i></span></a>
				</div>
				<div class="hammer-image">
					<img src="{{asset('frontend/assets/images/resource/hammer.png')}}" alt="" />
				</div>
			</div>
		</div>
	</section>
	<!-- End CTA Section -->
@endsection
