@extends('frontend.layouts.master')

@section('content')

<!-- Page Title -->
<section class="page-title" style="background-image:url({{asset(get_setting('background_header'))}})">
    <div class="auto-container">
        <h1>Nous contacter</h1>
        <ul class="page-breadcrumb">
            <li><a href="{{route('home')}}">Accueil</a></li>
            <li>Nous contacter</li>
        </ul>
    </div>
</section>
<!-- End Page Title -->

<!-- Map Section -->
<section class="map-section">
    <div class="auto-container">
        <div class="inner-container">
            <!-- Map Boxed -->
            <div class="map-boxed">
                <!-- Map Outer -->
                <div class="map-outer">
                    {{-- <iframe src="{{get_setting('map_url')}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
                    {!! html_entity_decode(get_setting('map_url')) !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Map Section -->

<!-- Contact Form Section -->
<section class="contact-form-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>ENVOYEZ-NOUS UN MESSAGE</h2>
        </div>
        <!-- Contact Form -->
        <div class="contact-form">
            @include('components.errors')
            <!--Contact Form-->
            <form action="{{route('contact.submit')}}" method="POST">
                @csrf
                <div class="row clearfix">

                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                        <input type="text" id="full_name" name="full_name" value="{{old('full_name')}}" placeholder="Nom Complet" required>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                        <input type="email" name="email" id="email" value="{{old('email')}}" placeholder="Email" required>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                        <input type="text" id="telephone" name="telephone" value="{{old('telephone')}}" placeholder="Telephone" required>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <textarea name="message" id="message" minlength="20" placeholder="Message" required>{{old('message')}}</textarea>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
                        <button class="theme-btn btn-style-two" type="submit">
                            <span class="txt">Envoyer
                                <i class="arrow flaticon-right"></i>
                            </span>
                        </button>
                    </div>

                </div>
            </form>
            <!--End Contact Form -->
        </div>
    </div>
</section>
<!-- End Contact Form Section -->

<!-- Contact Info Section -->
<section class="contact-info-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>Nos Infromations</h2>
        </div>
        <div class="row clearfix">

            <!-- Info Block -->
            <div class="info-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="icon flaticon-location-pin"></div>
                    <h5>Adresse</h5>
                    <div class="text"> {{get_setting('adresse')}}, {{get_setting('lot')}}, <br> {{get_setting('appartement')}}</div>
                </div>
            </div>

            <!-- Info Block -->
            <div class="info-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="icon flaticon-smartphone"></div>
                    <h5>Telephone</h5>
                    <ul class="info-list">
                        <li><a href="tel:+{{get_setting('telephone1')}}">+{{App\Models\Setting::value('telephone1')}}</a></li>
                        {{-- <li><a href="tel:+{{get_setting('telephone2')}}">+{{App\Models\Setting::value('telephone2')}}</a></li> --}}
                    </ul>
                </div>
            </div>

            <!-- Info Block -->
            <div class="info-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="icon flaticon-email-3"></div>
                    <h5>Email</h5>
                    <ul class="info-list">
                        <li><a href="mailto:{{get_setting('email_1')}}">{{App\Models\Setting::value('email_1')}}</a></li>
                        {{-- <li><a href="mailto:{{get_setting('email_2')}}">{{App\Models\Setting::value('email_2')}}</a></li> --}}
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Contact Info Section -->

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
