<!doctype html>
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
