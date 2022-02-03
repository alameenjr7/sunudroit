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
<!-- Main Footer -->
<footer class="main-footer">
    <div class="auto-container">
        <!-- Widgets Section -->
        <div class="widgets-section">
            <!-- Scroll To Top -->
            <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
            <div class="row clearfix">

                <!-- Big Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a href="{{route('home')}}"><img src="{{asset('frontend/assets/images/sunudroit-logo/logo-2.png')}}" alt="" style="width: 240px; height: 60px;"/></a>
                                </div>
                                <div class="text">Quis autem vel eum iure reprehenderit aui ea voluptate velit esse molestiae consequatur, vel illum qui dolorem.</div>
                                <!-- Social Nav -->
                                <ul class="social-nav">
                                    <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                    <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h5>Useful links</h5>
                                <ul class="footer-list">
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="{{route('about')}}">About Us</a></li>
                                    <li><a href="{{route('service')}}">Services</a></li>
                                    <li><a href="{{route('publication')}}">Blog</a></li>
                                    <li><a href="{{route('contact')}}">Contact Us</a></li>
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
                                <h5>Office Info</h5>
                                <ul>
                                    <li>
                                        <span class="icon flaticon-call-1"></span>
                                        <a href="tel:+221-77-655-14-84">+221 77 655 14 84</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-call-1"></span>
                                        <a href="tel:+221-33-848-7988">+221 33 848 79 88</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-email-2"></span>
                                        <a href="mailto:management@sunudroit.tech">management@sunudroit.tech</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-maps-and-flags"></span>
                                        Cité Keur Gougui, Lot N°R85,<br> Imm. Neptune Optique
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget newsletter-widget">
                                <h5>ABONNEZ-VOUS MAINTENANT!</h5>
                                <div class="text">Quis autem vel eum iure reprehenderit aui ea voluptate.</div>
                                <div class="newsletter-form">
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
            <div class="copyright">Copyright 2022, Sunudroit. Tous droits réservés.</div>
        </div>
    </div>
</footer>
