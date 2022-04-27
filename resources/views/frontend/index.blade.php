@extends('frontend.layouts.master')

@section('content')
	<!-- Banner Section -->
	@if (count($banners)>0)
    <!-- Banner Section 11111111111111111-->
		{{-- <section class="banner-section">
			<!-- Social Nav -->
			<ul class="social-nav">
				<li class="facebook"><a href="#"><span class="fa fa-facebook-f"></span></a></li>
				<li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
				<li class="linkedin"><a href="#"><span class="fa fa-linkedin"></span></a></li>
				<li class="instagram"><a href="#"><span class="fa fa-instagram"></span></a></li>
				<li class="youtube"><a href="#"><span class="fa fa-youtube"></span></a></li>
			</ul>
			<div class="main-slider-carousel owl-carousel ">
				@foreach ($banners as $banner)
					<div class="slide" style="background-image: url({{asset($banner->photo)}})">
						<div class="auto-container">

							<!-- Content Column -->
							<div class="content-column">
								<div class="inner-column">
									<div class="title">{{$banner->title}}</div>
									<h1 style="font-size: 250%;">{{$banner->subtitle}} <br><br> </h1>
									<div class="text">{!! html_entity_decode($banner->description) !!}</div>
									<div class="btns-box">
										<a href="contact.html" class="theme-btn btn-style-one"><span class="txt">Consultation Gratuite <i class="arrow flaticon-right"></i></span></a>
									</div>
								</div>
							</div>

						</div>
					</div>
				@endforeach
			</div>

		</section> --}}
    <!-- End Banner Section 11111111111111111-->

		<!-- banner-section 222222222222222 -->
		<section class="banner-section style-three">
			<!-- Social Nav -->
			<ul class="social-nav">
				<li class="facebook"><a href="{{App\Models\Setting::value('facebook_url')}}"><span class="fa fa-facebook-f"></span></a></li>
				{{-- <li class="twitter"><a href="{{App\Models\Setting::value('twitter_url')}}"><span class="fa fa-twitter"></span></a></li> --}}
				<li class="linkedin"><a href="{{App\Models\Setting::value('linkedin_url')}}"><span class="fa fa-linkedin"></span></a></li>
				<li class="instagram"><a href="{{App\Models\Setting::value('instagram_url')}}"><span class="fa fa-instagram"></span></a></li>
				{{-- <li class="youtube"><a href="{{App\Models\Setting::value('youtube_url')}}"><span class="fa fa-youtube"></span></a></li> --}}
			</ul>
			<div class="banner-carousel owl-theme owl-carousel owl-dots-none">
				@foreach ($banners as $banner)
					<div class="slide-item">
						<div class="image-layer" style="background-image:url({{asset($banner->photo)}})"></div>
						<div class="pattern-layer">
							<div class="pattern-3" style="background-image: url({{asset('frontend/assets/images/shape/pattern-28.png')}});"></div>
							<div class="pattern-4" style="background-image: url({{asset('frontend/assets/images/shape/pattern-29.png')}});"></div>
						</div>
						<div class="auto-container">
							<div class="row clearfix">
								<div class="col-lg-10 col-md-12 col-sm-12 offset-lg-2 content-column">
									<div class="inner-column">
										<div class="title">{{$banner->title}}</div>
										<h1>{{$banner->subtitle}} <br> </h1>
										<div class="text"><p>{!! html_entity_decode(\Illuminate\Support\Str::words($banner->description,20)) !!}</p></div>
										<div class="btns-box">
											<a href="{{route('calcul.droit')}}" class="theme-btn btn-style-one"><span class="txt">Calculer Vos Droits <i class="arrow flaticon-right"></i></span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</section>
		<!-- End banner-section 22222222222222-->
	@endif
	<!-- End Banner Section -->
    <div class="spacer"></div>
	<!-- Services Section -->
	@if (count($categories)>0)
	<section class="services-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="row clearfix">
					@foreach ($categories as $cat)
					<!-- Services Block -->
					<div class="services-block col-lg-6 col-md-12 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-file"></div>
								<h4><a href="{{route('publucation.categorie',$cat->slug)}}">{{$cat->title}}</a></h4>
								<div class="text"><p>{!! html_entity_decode(\Illuminate\Support\Str::words($cat->description,20)) !!}</p></div>
							</div>
							<a href="{{route('categorie.detail',$cat->slug)}}" class="arrow flaticon-right"></a>
						</div>
					</div>
					<!-- End Services Block -->
					@endforeach

				</div>
			</div>
		</div>
	</section>
	@endif
	<!-- End Services Section -->

	<!-- Welcome Section -->
	{{-- <section class="welcome-section" style="background-image: url({{asset('frontend/assets/images/background/pattern-2.png)')}})">
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
								@php
									$nombreContrat = App\Models\DocumentPdf::where('status','activer')->count();
								@endphp
								{{$nombreContrat}}<sup>+</sup>
								<span>Contrat <br> Disponible</span>
							</div>
						</div>
					</div>

					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							<div class="sec-title">
								<h2>Bienvenue a SUNUDROIT</h2>
								<div class="text">Nemo enim ipsam voluptatem quia voluptas sit asperaut odit aut fugit, quia voluptas sit asperaut  sed quia consequuntur magni dolor eos qui ratione voluptatem sequi nesciunt aorro quisuest, rui dolorem ipsum nuia dolor.</div>
							</div>
							<ul class="list-style-one">
								<li>Velit esse quam nihil molestiae consequatur, velillu. </li>
								<li>Qui dolorem eum fugiat quo voluptas nulla pariatur. </li>
								<li>Aspernatur aut odit aut fugit commodo luis cursus.</li>
								<li>Ratione voluptatem sequi nesciunt nerue porro.</li>
							</ul>
							<div class="btns-box">
								<a href="{{route('calcul.droit')}}" class="theme-btn btn-style-two"><span class="txt">Calculez vos droits <i class="arrow flaticon-right"></i></span></a>
								<a href="{{route('document.pdf')}}" class="theme-btn btn-style-three"><span class="txt">Voir PDF <i class="arrow flaticon-right"></i></span></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section> --}}
	<!-- End Welcome Section -->

	<!-- Counter Section -->
	{{-- <section class="counter-section">
		<div class="image-layer" style="background-image: url({{asset('frontend/assets/images/background/1.jpg)')}})"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title light centered">
				<h2>Vidéo de présentation</h2>
				<div class="text">Découvrer en vidéo le portail sunudroit.tech <br> </div>
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
	</section> --}}
	<!-- End Counter Section -->

	<!-- Practice Section -->
	{{-- <section class="practice-section" style="background-image: url({{asset('frontend/assets/images/background/pattern-2.png')}})">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>INFORMATIONS PRATIQUES</h2>
			</div>
			<div class="inner-container">
				<div class="clearfix">
					@if (count($infos)>0)
						@foreach ($infos as $info)
							<div class="practice-block col-lg-3 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon {{$info->icons}}"></div>
										<h5><a href="#">{{$info->title}}</a></h5>
										<div class="text">
											<p>{!! html_entity_decode(\Illuminate\Support\Str::words($info->description,20)) !!}</p>
										</div>
										<a class="arrow flaticon-right-arrow-3" href="{{route('info.detail',$info->slug)}}"></a>
									</div>
							</div>
						@endforeach
					@endif

				</div>
			</div>
		</div>
	</section> --}}
	<!-- End Practice Section -->

	<!-- Fluid Section One -->

    <section class="fluid-section-one" id="section-question">
		<div class="side-icon"><img src="{{asset(get_setting('logo2'))}}" alt="" /></div>
    	<div class="outer-container clearfix">
        	<!-- Image Column -->
            <div class="image-column clearfix" style="height:50%;background-image:url({{asset('frontend/assets/img/banner1.jpg')}})">

            	<div class="inner-column">
					<div class="sec-title light">
						<h2>Qui Sommes-Nous?</h2>
						<div class="text">{!! html_entity_decode(get_setting('about')) !!}</div>
					</div>
					{{-- @if (count($consultations)>0)
						@foreach ($consultations as $consultation)
							<!-- Accordian Box -->
							<ul class="accordion-box">
								<!-- Block -->
								<li class="accordion block active-block">
									<div class="acc-btn active"><div class="icon-outer"><span class="icon icon-plus flaticon-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div>{{$consultation->message}}</div>
									<div class="acc-content current">
										<div class="content">
											<div class="accordian-text">{{$consultation->response}}</div>
										</div>
									</div>
								</li>
								<!-- End Block -->
							</ul>
							<!-- Accordian Box -->
						@endforeach
					@endif --}}
                    <a class="arrow flaticon-right-arrow-3 float-right" href="{{route('about')}}" title="Voir Plus"></a>
				</div>
            </div>

        	<!-- Content Column -->
            <div class="content-column">
            	<div class="inner-column">
					<div class="sec-title">
						<h2>Infos Pratiques</h2>
                        <div class="text">
                            {{-- <div class="column col-lg-6 col-md-6 col-sm-6"> --}}
                                <ul class="list-style-one">
                                    <li>Délégation de puissance paternelle</li>
                                    <li>Jugement d’hérédité</li>
                                    <li>Rectificatif d’acte d’état civil</li>
                                    <li>Administration légale</li>
                                </ul>
                            {{-- </div> --}}
                        </div>
					</div>

					<!-- Default Form -->
					{{-- <div class="default-form">
						@include('components.errors')
						<form method="post" action="{{route('consultation.submit')}}">
							@csrf
							<div class="row clearfix">

								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<input class="form-control @error('full_name') is-invalid @enderror" type="text" name="full_name" id="full_name" value="{{old('full_name')}}" placeholder="Nom complet" required>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{old('email')}}" placeholder="E-mail" required>
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<select name="sujet" class="custom-select-box">
										<option value="">-- Choisir --</option>
										<option value="DF" {{old('sujet')=='DF' ? 'selected' : ''}}>Droit de la Famille</option>
										<option value="DT" {{old('sujet')=='DT' ? 'selected' : ''}}>Droit du Travail</option>
										<option value="BC" {{old('sujet')=='BC' ? 'selected' : ''}}>Bail Commercial</option>
										<option value="BUH" {{old('sujet')=='BUH' ? 'selected' : ''}}>Bail a usage d'habitatin</option>
										<option value="DS" {{old('sujet')=='DS' ? 'selected' : ''}}>Droit des Societes</option>
										<option value="DC" {{old('sujet')=='DC' ? 'selected' : ''}}>Droit des Contrats</option>
										<option value="AUTRES" {{old('sujet')=='AUTRES' ? 'selected' : ''}}>Droit des Contrats</option>
									</select>
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<textarea class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Message">{{old('message')}}</textarea>
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<button class="theme-btn btn-style-two" type="submit" name="submit-form"><span class="txt">Soumettre maintenant <i class="arrow flaticon-right"></i></span></button>
								</div>

							</div>
						</form>
					</div> --}}
					<!-- End Default Form -->
                    <a class="arrow flaticon-right-arrow-3 float-right" href="{{route('service')}}" title="Voir Plus"></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Fluid Section One -->

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

	<!-- Testimonail Section -->
	{{-- <section class="testimonial-section" style="background-image: url({{asset('frontend/assets/images/background/pattern-3.png')}})">
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
	</section> --}}
	<!-- End Testimonail Section -->

	<!-- Clients Section -->
	{{-- @if (count($categories)>0)
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

@section('scripts')

@endsection

