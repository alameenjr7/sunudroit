<div class="spacer"></div>

<!-- CTA Section -->
<section class="cta-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="image">
                <img src="{{asset(get_setting('background_footer'))}}" alt="" />
            </div>
            <div class="content">
                <h2>Parlez avec nos <br> experts aujourd'hui!</h2>  
                
                <a href="tel:+{{get_setting('telephone1')}}" class="theme-btn btn-style-two"><span class="txt">{{-- Obtener un devis --}} <i class="arrow flaticon-right"></i></span></a>
            </div>
            <div class="hammer-image">
                <img src="{{asset(get_setting('image_footer'))}}" alt="" />
            </div>
        </div>
    </div>
</section>
<!-- End CTA Section -->

<!-- Main Footer -->
<footer class="main-footer">
    <div class="auto-container">
        <!-- Widgets Section -->
        <div class="widgets-section">
            <!-- Scroll To Top -->
            <div class="scroll-to-top scroll-to-target" data-target="html">
                <span class="fa fa-angle-up"></span>
            </div>
            <div class="row clearfix">

                <!-- Big Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a href="{{route('home')}}"><img src="{{asset(get_setting('favicon'))}}" alt="" style="width: 240px; height: 60px;"/></a>
                                </div>
                                <div class="text">{{get_setting('footer')}}</div>
                                <!-- Social Nav -->
                                <ul class="social-nav">
                                    <li><a href="{{App\Models\Setting::value('facebook_url')}}"><span class="fa fa-facebook-f"></span></a></li>
                                    <li><a href="{{App\Models\Setting::value('twitter_url')}}"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="{{App\Models\Setting::value('linkedin_url')}}"><span class="fa fa-linkedin"></span></a></li>
                                    <li><a href="{{App\Models\Setting::value('instagram_url')}}"><span class="fa fa-instagram"></span></a></li>
                                    <li><a href="{{App\Models\Setting::value('youtube_url')}}"><span class="fa fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h5>Liens utiles</h5>
                                <ul class="footer-list">
                                    <li><a href="{{route('home')}}">Accueil</a></li>
                                    <li><a href="{{route('about')}}">Qui sommes nous?</a></li>
                                    <li><a href="{{route('service')}}">Infos Pratiques</a></li>
                                    <li><a href="{{route('publication')}}">Publications</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Big Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget contact-widget">
                                <h5>Info Bureau</h5>
                                <ul>
                                    <li>
                                        <span class="icon flaticon-call-1"></span>
                                        <a href="tel:+{{get_setting('telephone1')}}">+{{get_setting('telephone1')}}</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-call-1"></span>
                                        <a href="tel:+{{get_setting('telephone2')}}">+{{get_setting('telephone2')}}</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-email-2"></span>
                                        <a href="mailto:{{get_setting('email_1')}}">{{get_setting('email_1')}}</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-maps-and-flags"></span>
                                        {{get_setting('adresse')}}, {{get_setting('lot')}},<br> {{get_setting('appartement')}}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget newsletter-widget">
                                <h5>ABONNEZ-VOUS MAINTENANT!</h5>
                                <div class="text">{{get_setting('text_abonnement')}}</div>
                                <div class="newsletter-form">
                                    @include('components.errors')
                                    <form method="post" action="{{route('mailing.list.submit')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{old('email')}}" placeholder="Entrer votre Adresse Email" required>
                                            <button type="submit" class="theme-btn btn-style-one"><span class="txt">S'abonner <i class="arrow flaticon-right"></i></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="copyright">{{get_setting('meta_description')}}</div>
        </div>
    </div>
</footer>
