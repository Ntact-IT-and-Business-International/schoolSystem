<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @include('layouts.front.title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- css -->
    @include('layouts.front.css')

</head>

<body>
    <div id="wrapper">

        <!-- start header -->
        @include('layouts.front.menu')
        <!-- end header -->
        @include('layouts.front.breadcrumb')
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="clearfix">
                        </div>
                        <div class="row">
                            <section id="projects">
                                <ul id="thumbs" class="portfolio">
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs col-lg-3 design" data-id="id-0" data-type="web">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="{{ asset('Front/img/works/1.jpg')}}">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb"><i class="icon-info-blocks fa fa-code"></i></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="{{ asset('Front/img/works/1.jpg')}}" alt="">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs col-lg-3 design" data-id="id-1" data-type="icon">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="{{ asset('Front/img/works/2.jpg')}}">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb"><i class="icon-info-blocks fa fa-code"></i></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="{{ asset('Front/img/works/2.jpg')}}" alt="">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="graphic">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="{{ asset('Front/img/works/3.jpg')}}">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb"><i class="icon-info-blocks fa fa-code"></i></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="{{ asset('Front/img/works/3.jpg')}}" alt="">
                                    </li>
									<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="graphic">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="{{ asset('Front/img/works/3.jpg')}}">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb"><i class="icon-info-blocks fa fa-code"></i></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="{{ asset('Front/img/works/3.jpg')}}" alt="">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs col-lg-3 design" data-id="id-0" data-type="web">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="{{ asset('Front/img/works/4.jpg')}}">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb"><i class="icon-info-blocks fa fa-code"></i></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="{{ asset('Front/img/works/4.jpg')}}" alt="">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs col-lg-3 photography" data-id="id-4" data-type="web">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="{{ asset('Front/img/works/5.jpg')}}">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb"><i class="icon-info-blocks fa fa-code"></i></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="{{ asset('Front/img/works/5.jpg')}}" alt="">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs col-lg-3 photography" data-id="id-5" data-type="icon">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="{{ asset('Front/img/works/6.jpg')}}">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb"><i class="icon-info-blocks fa fa-code"></i></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="{{ asset('Front/img/works/6.jpg')}}" alt="">
                                    </li>
                                    <!-- End Item Project -->
                                    <li class="item-thumbs col-lg-3 design" data-id="id-0" data-type="web">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="{{ asset('Front/img/works/7.jpg')}}">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb"><i class="icon-info-blocks fa fa-code"></i></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="{{ asset('Front/img/works/7.jpg')}}" alt="">
                                    </li>
                                    <!-- End Item Project -->
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs col-lg-3 design" data-id="id-0" data-type="graphic">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="{{ asset('Front/img/works/8.jpg')}}">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb"><i class="icon-info-blocks fa fa-code"></i></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="{{ asset('Front/img/works/8.jpg')}}" alt="">
                                    </li>
                                    <!-- End Item Project -->
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.front.footer')
    </div>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
    <!-- javascript
    ================================================== -->
    @include('layouts.front.javascript')
</body>

</html>