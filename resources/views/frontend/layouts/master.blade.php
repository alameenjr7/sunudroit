<!doctype html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html lang="en">

    <head>
        @include('frontend.layouts.head')
    </head>

    <body class="hidden-bar-wrapper">

        <div class="page-wrapper">

            <!-- Preloader -->
            <div class="preloader"></div>


            <!-- Header Area -->
            <header class="main-header header-style-two" style="background-color: transparent">
                @include('frontend.layouts.header')
            </header>
            <!-- Header Area End -->


            <!-- Content Area -->
            @yield('content')
            <!-- Content Area -->


            <!-- Footer Area -->
            @include('frontend.layouts.footer')
            <!-- Footer Area -->


            <!-- jQuery (Necessary for All JavaScript Plugins) -->
            @include('frontend.layouts.scripts')
            <!-- jQuery (Necessary for All JavaScript Plugins) -->
        </div>
    </body>

</html>
