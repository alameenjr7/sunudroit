@extends('frontend.layouts.master')

@section('content')

	<!-- Page Title -->
    <section class="page-title style-two" style="background-image:url({{asset(get_setting('background_header'))}})">
    	<div class="auto-container">
			{{-- <h1>Nos publications</h1> --}}
			<ul class="page-breadcrumb">
				<li><a href="{{route('home')}}">Accueil</a></li>
				<li>Publications</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">

				<!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                	<div class="blog-classic">
							@foreach ($publications as $pub)
								<!-- News Block -->
								@include('frontend.layouts._signle-publication',['publications'=>$pub])
								<!-- News Block -->
							@endforeach

					</div>

					<!--Post Share Options-->
					<div class="styled-pagination text-center">
						{{-- <ul class="clearfix">
							<li class="prev"><a href="#"><span class="flaticon-back"></span> </a></li>
							<li><a href="#">1</a></li>
							<li class="active"><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li class="next"><a href="#"><span class="flaticon-next-1"></span> </a></li>
						</ul> --}}
						{{$publications->appends($_GET)->links()}}
					</div>

				</div>

				<!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">
						<div class="sidebar-inner">

							<!-- Search -->
							<div class="sidebar-widget search-box">
								<form method="GET" action="{{route('search')}}">
									<div class="form-group">
										<input type="search" name="query" id="search_text" value="" placeholder="Rechercher ....." required>
										<button type="submit"><span class="icon fa fa-search"></span></button>
									</div>
								</form>
							</div>

							{{-- <!--Blog Category Widget-->
							@include('frontend.layouts._categorieFilter')
							<!--Blog Category Widget--> --}}

							<!-- Popular Post Widget -->
							<div class="sidebar-widget popular-posts">
									<div class="widget-content">
										<div class="sidebar-title">
											<h5>Derniere Publication</h5>
										</div>
										@foreach ($lastPublication as $lpub)
											@include('frontend.layouts._last-post',['lastPublication'=>$lpub])
										@endforeach
									</div>
							</div>

							<!-- Tags Widget -->
							{{-- <div class="sidebar-widget popular-tags">
								<div class="widget-content">
									<div class="sidebar-title">
										<h5>Tags</h5>
									</div>
									<a href="#">Cloud</a>
									<a href="#">Life style</a>
									<a href="#">Hosting</a>
									<a href="#">Business</a>
								</div>
							</div> --}}

						</div>
					</aside>
				</div>

			</div>
		</div>
	</div>

	<!-- Facts Section three -->
    <section class="facts-section-three" style="background-image: url({{asset('frontend/assets/images/background/1.jpg')}});">

        <div class="auto-container">
            <div class="fact-counter-style-three">
                <div class="row">
                    <!--Column-->
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
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
