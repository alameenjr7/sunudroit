{{--
    <div class="auto-container clearfix">
        <!--  Header Top -->
        <div class="header-top clearfix">
            <div class="top-left pull-left clearfix">
                <ul class="info-box clearfix">
                    <li><i class="flaticon-headphones"></i><a href="tel:+{{get_setting('telephone1')}}">+{{App\Models\Setting::value('telephone1')}}</a></li>
                    <li><i class="flaticon-email"></i><a href="mailto:{{get_setting('email_1')}}">{{App\Models\Setting::value('email_1')}}</a></li>
                </ul>
            </div>
            <div class="top-right pull-right clearfix">
                <div class="request-btn"><i class="flaticon-right-arrow-3"></i><a href="#section-question">Posez Vos Questions!</a></div>
                <div class="search-box-outer">
                    <form action="{{route('search')}}" method="GET" class="search-btn">
                        <button type="submit" class="search-toggler"><i class="flaticon-search"></i>Rechercher</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container clearfix">

            <div class="pull-left logo-box">
                <div class="logo"><a href="{{route('home')}}"><img src="{{asset(get_setting('logo'))}}" alt="" title="" style="width: 230px; height: 60px;"></a></div>
            </div>

            <div class="nav-outer clearfix">
                <!-- Mobile Navigation Toggler -->
                <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">

                        <ul class="navigation clearfix">
                            <li class="current ">
                                <a href="{{route('home')}}">Accueil</a>
                            </li>
                            <li class="">
                                <a href="{{route('about')}}">Qui sommes nous?</a>
                            </li>
                            <li class="dropdown"><a href="#">Mes droits</a>
                                <ul>
                                    <li><a href="{{route('calcul.droit')}}">Calculer mes droits</a></li>
                                    <li><a href="{{route('document.pdf')}}">Télécharger mes documents juridiques</a></li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="{{route('service')}}">Infos Pratiques</a>
                            </li>
                            <li class="">
                                <a href="{{route('publication')}}">Publication</a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main Menu End-->
                {{-- <div class="outer-box clearfix">

                    <!-- Btn Box -->
                    <div class="btn-box">
                        <a href="{{route('contact')}}" class="theme-btn btn-style-one"><span class="txt">Nous Contacter</span></a>
                    </div>

                </div> --}}
            </div>

        </div>
    </div>
    <!--End Header Upper-->

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="{{route('home')}}" title=""><img src="{{asset(get_setting('logo2'))}}" alt="" title="" style="width: 180px; height: 55px;"></a>
            </div>
            <!--Right Col-->
            <div class="pull-right">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav><!-- Main Menu End-->

                <!-- Main Menu End-->
                {{--   --}}

            </div>
        </div>
    </div><!-- End Sticky Menu -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="{{route('home')}}"><img src="{{asset(get_setting('logo2'))}}" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        </nav>
    </div><!-- End Mobile Menu -->

