<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/plyr.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/photoswipe.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/default-skin.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{asset('frontend/icon/favicon-32x32.png')}}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{asset('frontend/icon/favicon-32x32.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('frontend/icon/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('frontend/icon/apple-touch-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('frontend/icon/apple-touch-icon-144x144.png')}}">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>@yield('title')</title>

</head>
<body class="body">

@stack('header')

@yield('login')

@yield('register')

@yield('catalog')

@yield('movie_details')

<!-- home -->
@yield('new_items_season')
<!-- end home -->

<!-- content -->
@yield('new_items')
<!-- end content -->

<!-- expected premiere -->
@if($premieres->count() > 0)
   @yield('expected_premiere')
   @endif
<!-- end expected premiere -->

<!-- partners -->
    @yield('our_partners')
<!-- end partners -->

@stack('footer')

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
    It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <!-- Preloader -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
<!-- JS -->
<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.mousewheel.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.mCustomScrollbar.min.js')}}"></script>
<script src="{{asset('frontend/js/wNumb.js')}}"></script>
<script src="{{asset('frontend/js/nouislider.min.js')}}"></script>
<script src="{{asset('frontend/js/plyr.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.morelines.min.js')}}"></script>
<script src="{{asset('frontend/js/photoswipe.min.js')}}"></script>
<script src="{{asset('frontend/js/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
</body>

</html>
