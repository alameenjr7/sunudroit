@extends('frontend.layouts.master')

@section('content')

	<!-- Page Title -->
    {{-- <section class="page-title style-two" style="background-image:url(images/background/1.jpg)">
    	<div class="auto-container">
			<h1>Detail publications</h1>
			<ul class="page-breadcrumb">
				<li><a href="{{route('home')}}">Accueil</a></li>
				<li>Publications</li>
			</ul>
        </div>
    </section> --}}
    <!-- End Page Title -->
	
	<!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                	<!-- Block Detail -->
                    {{-- @if (count($publication)>0)    --}}
                        <div class="blog-detail">
                            {{-- @foreach ($publication as $publication) --}}
                                <div class="inner-box">
                                    <div class="image" style="max-width: 769.980px; max-height: 460.918px;">
                                        <img src="{{$publication->photo}}" alt="{{$publication->title}}" />
                                        <div class="category">Admin</div>
                                        <ul class="post-meta">
                                            <li><span class="icon flaticon-timetable"></span>{{$publication->getCreatedAt()}}</li>
                                            <li><span class="icon flaticon-email"></span>Comments 03</li>
                                            <li><span class="icon flaticon-user-2"></span>Admin</li>
                                        </ul>
                                    </div>
                                    <div class="lower-content">
                                        <h3 href="{{route('publication.detail1',$publication->id)}}">{{ucfirst($publication->title)}} </h3>
                                        <h6>{{ucfirst($publication->subtitle)}}</h6>
                                        <p>{!! html_entity_decode($publication->contenu) !!} </p>
                                        <blockquote>
                                            <span class="quote-icon flaticon-quote-1"></span>
                                            <div class="quote-text"></div>
                                        </blockquote>
                                        
                                        <!-- Post Share Options-->
                                        {{-- <div class="post-share-options">
                                            <div class="post-share-inner clearfix">
                                                <div class="pull-left tags">TAGS: <a href="#">Business,</a> <a href="#">Law,</a><a href="#">Technology</a></div>
                                                <div class="tags pull-right">
                                                    <div class="business">Category: <a href="#">Business,</a> <a href="#">Online Law</a></div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    
                                    <!-- Blog Author Box -->
                                    {{-- <div class="blog-author-box">
                                        <div class="author-inner">
                                            <div class="thumb"><img src="images/resource/author-8.jpg" alt=""></div>
                                            <h4 class="name">CHRISTINE EVE</h4>
                                            <div class="text">Lorem ipsum is simply free text used by copytyping. Neque porro est qui dolorem ipsum quia quaed veritatis et quasi architecto beatae vitae dicta sunt explicabo.</div>
                                            <ul class="social-icon clearfix">
                                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                    
                                </div>
                            {{-- @endforeach --}}
                            
                            <div class="comments-area">
                                <div class="group-title">
                                    <h5>Commentaires ({{App\Models\PublicationReview::where('publication_id',$publication->id)->count()}})</h5>
                                </div>
                                @php
                                    $reviews = App\Models\PublicationReview::where('publication_id',$publication->id)->latest()->paginate(2);
                                @endphp
                                @if (count($reviews)>0)
                                    <div class="comment-box">
                                        @foreach ($reviews as $review)
                                            <div class="comment">
                                                {{-- <div class="author-thumb"><img src="images/resource/author-9.jpg" alt=""></div> --}}
                                                <div class="comment-info clearfix"><strong>{{$review->full_name}}</strong><div class="comment-time">{{$review->getCreatedAt()}}</div></div>
                                                <div class="rating">
                                                    @for ($i=0; $i<4; $i++)
                                                        @if ($review->rate>$i)
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        @else
                                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <br>
                                                <div class="text">{{$review->review}}</div>
                                                {{-- <a class="theme-btn reply-btn" href="#">Reply Now <span class="arrow flaticon-right-arrow-1"></span></a> --}}
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                
                            </div>
                            
                            
                            <!-- Comment Form -->
                            <div class="comment-form">
                                
                                <div class="group-title"><h5>LAISSEZ UN COMMENTAIRE</h5></div>
                                
                                <!--Comment Form-->
                                <form method="post" action="{{route('publication.review',$publication->slug)}}">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                                            <div class="container">
                                                <label for="rating" class="form-group">Votre Note</label>
                                                <div class="row">
                                                    <div class="rating">
                                                        <input type="radio" name="rate" class="star-1" id="star-1" value="1">
                                                        <label for="star-1" class="star-1">1</label>
                                                        <input type="radio" name="rate" class="star-2" id="star-2" value="2">
                                                        <label for="star-2" class="star-2">2</label>
                                                        <input type="radio" name="rate" class="star-3" id="star-3" value="3">
                                                        <label for="star-3" class="star-3">3</label>
                                                        <input type="radio" name="rate" class="star-4" id="star-4" value="4">
                                                        <label for="star-4" class="star-4">4</label>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div hidden class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input hidden type="text" name="publication_id" id="publication_id" value="{{$publication->id}}" required>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="full_name" id="full_name" value="{{old('full_name')}}" placeholder="Nom complet" required>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="Email" required="">
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea class="" name="review" placeholder="Votre Message">{{old('review')}}</textarea>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <button class="theme-btn btn-style-three" type="submit" name="submit-form"><span class="txt">Envoyer</span></button>
                                        </div>
                                        
                                    </div>
                                </form>
                                    
                            </div>
                            
                            
                        </div>
                    {{-- @endif --}}
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
							
							<!--Blog Category Widget-->
							<div class="sidebar-widget sidebar-blog-category">
								<div class="widget-content">
									<div class="sidebar-title">
										<h5>Categories</h5>
									</div>
									<ul class="cat-list-two">
										<li><a href="#">Consulting <span>(25)</span></a></li>
										<li><a href="#">Life Style<span>(80)</span></a></li>
										<li><a href="#">Technology<span>(95)</span></a></li>
									</ul>
								</div>
							</div>
							
							<!-- Popular Post Widget -->
							<div class="sidebar-widget popular-posts">
								{{-- @if (count($lastPublication)>0)	 --}}
									<div class="widget-content">
										<div class="sidebar-title">
											<h5>Derniere Publication</h5>
										</div>
										@foreach ($lastPublication as $lpub)
                                            @include('frontend.layouts._last-post',['lastPublication'=>$lpub])
										@endforeach
									</div>
								{{-- @endif --}}
							</div>
							
							<!-- Tags Widget -->
							<div class="sidebar-widget popular-tags">
								<div class="widget-content">
									<div class="sidebar-title">
										<h5>Tags</h5>
									</div>
									<a href="#">Cloud</a>
									<a href="#">Life style</a>
									<a href="#">Hosting</a>
									<a href="#">Business</a>
								</div>
							</div>
							
						</div>
					</aside>
				</div>
				
			</div>
		</div>
	</div>
	
	<!-- Facts Section three -->
    {{-- <section class="facts-section-three" style="background-image: url(images/background/1.jpg);">
        
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
    </section> --}}

@endsection