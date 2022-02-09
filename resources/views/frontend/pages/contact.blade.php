@extends('frontend.layouts.master')

@section('content')

<!-- Page Title -->
<section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/1.jpg')}})">
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
                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805184.6331292129!2d144.49266890254142!3d-37.97123689954809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2s!4v1574408946759!5m2!1sen!2s" allowfullscreen=""></iframe> --}}
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.028235227538!2d-17.469440185846533!3d14.710995378307327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec173b4b3874b63%3A0xbf6bd7d773ce2ddd!2sLPS%20L%40W%2C%20SCP%20d&#39;Avocats!5e0!3m2!1sen!2sus!4v1643800014744!5m2!1sen!2sus"  allowfullscreen="" ></iframe>
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
            <h2>ENVOIE-NOUS UN MESSAGE</h2>
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
                    <div class="text"> Cité Keur Gougui, Lot N°R85, <br> Imm. Neptune Optique</div>
                </div>
            </div>

            <!-- Info Block -->
            <div class="info-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="icon flaticon-smartphone"></div>
                    <h5>Telephone</h5>
                    <ul class="info-list">
                        <li><a href="tel:+221-77-655-14-84">+221 77 655 14 84</a></li>
                        <li><a href="tel:+221-33-848-7988">+221 33 848 79 88</a></li>
                    </ul>
                </div>
            </div>

            <!-- Info Block -->
            <div class="info-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="icon flaticon-email-3"></div>
                    <h5>Email</h5>
                    <ul class="info-list">
                        <li><a href="mailto:management@sunudroit.tech">management@sunudroit.tech</a></li>
                        <li><a href="mailto:management@sunudroit.tech">info@sunudroit.com</a></li>
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
