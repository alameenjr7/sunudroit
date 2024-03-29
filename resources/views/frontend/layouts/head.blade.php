
<meta charset="utf-8">
{{-- <title>SunuDroit | Acceuil</title> --}}
<!-- Stylesheets -->
<link href="{{asset('frontend/assets/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/css/responsive.css')}}" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Open+Sans:wght@300;400;700;800&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">

<meta name="description" content="{{get_setting('meta_description')}}">
<meta name="keywords" content="{{get_setting('about')}}">
        <!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" href="{{asset(get_setting('favicon'))}}" type="image/x-icon">
<link rel="icon" href="{{asset(get_setting('logo'))}}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="stylesheet" href="{{asset('backend/assets/dist-assets/css/plugins/toastr.css')}}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

{{-- <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/chat.min.css')}}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}


<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CQWGSB2GTW"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CQWGSB2GTW');
</script>

@yield('title')
