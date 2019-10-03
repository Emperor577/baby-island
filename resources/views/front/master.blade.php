<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="{{ asset("front/images/favicon.ico") }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:400,300%7CRoboto+Condensed:400,700,300">
    <link rel="stylesheet" href="{{ asset("front/css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("front/css/fonts.css") }}">
    <link rel="stylesheet" href="{{ asset("front/css/myCustom.css") }}">
    <link rel="stylesheet" href="{{ asset("front/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("front/css/responsive.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("front/js/style.css") }}">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700&display=swap&subset=cyrillic,cyrillic-ext,greek,latin-ext,vietnamese" rel="stylesheet">
    <script src="{{ asset("front/js/modernizr.custom.63321.js") }}"></script>
    <style>.ie-panel { display: none; background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3); clear: both; text-align: center; position: relative; z-index: 1; } html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel { display: block; }</style>
</head>
<body>

<div class="ie-panel">
    <a href="http://windows.microsoft.com/en-US/internet-explorer/">
        <img src="{{ asset("front/images/ie8-panel/warning_bar_0000_us.jpg") }}" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
    </a>
</div>

<div class="preloader">
    <div class="preloader-body">
        <div class="cssload-container">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
    </div>
</div>

<div class="page">
    <section>
        <!-- Page Header-->
        <header class="section page-header rd-navbar-absolute">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-transparent" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <!-- RD Navbar Panel-->
                            <div class="rd-navbar-panel">
                                <!-- RD Navbar Toggle-->
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <!-- RD Navbar Brand-->
                                <div class="rd-navbar-brand">
                                    <a class="brand" href="index.html">
                                        <img  src="{{ asset("front/images/logo.png") }}" alt="" /> <span>Babby island</span>
                                    </a>
                                </div>
                            </div>
                            <div class="rd-navbar-main-element">
                                <div class="rd-navbar-nav-wrap">
                                    <!-- RD Navbar Nav-->
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item active"><a class="rd-nav-link" href="#home">@lang('translate.home')</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="#about-us">@lang('translate.about-us')</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="#uslugi">@lang('translate.service')</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="#pages">@lang('translate.gallery')</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="#Price">@lang('translate.price')</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="#contact-us">@lang('translate.contact')</a>
                                        </li>
                                        <li class="rd-nav-item">
                                            @if($locale === 'ru')
                                            <a class="rd-nav-link" href="{{ route('locale', "ru") }}">Ру</a>
                                            <ul class="rd-menu rd-navbar-dropdown">
                                                <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('locale', "uz") }}">Uz</a></li>
                                            </ul>
                                            @elseif($locale === 'uz')
                                            <a class="rd-nav-link" href="{{ route('locale', "uz") }}">Uz</a>
                                            <ul class="rd-menu rd-navbar-dropdown">
                                                <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('locale', "ru") }}">Ру</a></li>
                                            </ul>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <div id="home"  class="section swiper-container swiper-slider swiper-slider-1" data-loop="true" data-autoplay="5000" data-simulate-touch="false">
            <div class="swiper-wrapper text-center">
                @foreach($sliders as $slider)
                <div class="swiper-slide context-dark" data-slide-bg="{{ asset("storage/slider/".$slider->photo) }}">
                    <div class="swiper-slide-caption section-md">
                        <div class="container">
                            <div class="row row-fix justify-content-center">
                                <div class="col-md-11 col-lg-9 col-xxl-8">
                                    <h2 data-caption-animate="fadeInUp" data-caption-delay="100">{{ $slider->translate($locale)->title }}</h2>
                                    <hr>
                                    <h4 class="lead" data-caption-animate="fadeInUp" data-caption-delay="250">{{ $slider->translate($locale)->text }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Swiper Navigation-->
            <div class="swiper-navigation">
                <div class="swiper-button-prev fa-arrow-left"></div>
                <div class="swiper-button-next fa-arrow-right"></div>
            </div>
            <!-- Swiper Pagination-->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!--
    ========================================================
    CONTENT
    ========================================================
    -->
    <?php $i = 0; ?>
    @if(count($about_us) > 0)
        @foreach($about_us as $value)
            @if($i%2 == 0)
            <section id="about-us" class="novi-section">
                <div class="bg-aside bg-aside-left center">
                    <div class="img">
                        <img src="{{ asset("storage/about-us/".$value->photo) }}" alt="" width="1025" height="664"/>
                    </div>
                    <div class="cnt-block well-1 novi-background">
                        {!! $value->translate($locale)->text !!}
                    </div>
                </div>
            </section>
                <?php $i++ ?>
            @else
            <section class="novi-section" data-preset='{"title":"Content box 2","category":"content box","reload":false,"id":"content-box-2"}'>
                    <div class="bg-aside bg-aside-right center">
                        <div class="img">
                            <img src="{{ asset("storage/about-us/".$value->photo) }}" alt="" width="1025" height="664"/>
                        </div>
                        <div class="cnt-block well-1 novi-background">
                            {!! $value->translate($locale)->text !!}
                        </div>
                    </div>
                </section>
                <?php $i++ ?>
            @endif
        @endforeach
    @else
        <section id="about-us" class="novi-section">
            <div class="bg-aside bg-aside-left center">
                <div class="img"><img src="{{ asset("front/images/home-1-1025x664.jpg") }}" alt="" width="1025" height="664"/>
                </div>
                <div class="cnt-block well-1 novi-background">
                    <h2>Who we are</h2>
                    <hr>
                    <h4>We are a network of nursery centers providing learning and childcare to 100+ children and support for their families.</h4><a class="button button-default" href="about-us.html">Read more</a>
                </div>
            </div>
        </section>
        <section class="novi-section" data-preset='{"title":"Content box 2","category":"content box","reload":false,"id":"content-box-2"}'>
            <div class="bg-aside bg-aside-right center">
                <div class="img"><img src="{{ asset("front/images/home-2-1025x664.jpg") }}" alt="" width="1025" height="664"/>
                </div>
                <div class="cnt-block well-1 novi-background">
                    <h2>Our values</h2>
                    <hr>
                    <h4>Beauty, growth, development, and happiness are the foundation we use to guide our daily interactions and decision-making.</h4><a class="button button-default" href="about-us.html">Read more</a>
                </div>
            </div>
        </section>
        <section class="novi-section">
            <div class="bg-aside bg-aside-left center">
                <div class="img"><img src="{{ asset("front/images/home-3-1025x664.jpg") }}" alt="" width="1025" height="664"/>
                </div>
                <div class="cnt-block well-1 novi-background">
                    <h2>Why us?</h2>
                    <hr>
                    <h4>Discover why hundreds of families all over the USA pick our nursery center for their children.</h4><a class="button button-default" href="about-us.html">Read more</a>
                </div>
            </div>
        </section>
    @endif


    <section class="well-4 bg-default novi-background bg-cover uslugi" id="uslugi">
      <div class="container center">
        <h2>Наши услуги</h2>
        <hr>
        <h4>Read the latest news and updates from Happy Kids.</h4>
        <div class="row row-30 offset-custom-2">
          <article class="col-sm-6 col-md-4"><a class="post" href="blog-post.html"><img src="{{ asset("front/images/home-7-370x453.jpg") }}" alt="" width="370" height="453"/>
              <div class="post_cnt">
                <h3>How Testing Buoyancy Can Build Babies’ Skills</h3>
                <time datetime="2015-04-14">April 10, 2018</time>
              </div></a></article>
          <article class="col-sm-6 col-md-4"><a class="post" href="blog-post.html"><img src="{{ asset("front/images/home-8-370x453.jpg") }}" alt="" width="370" height="453"/>
              <div class="post_cnt">
                <h3>Preschool Science Activities Make Kids Independent Thinkers</h3>
                <time datetime="2015-04-14">April 12, 2018</time>
              </div></a></article>
          <article class="col-sm-6 col-md-4"><a class="post" href="blog-post.html"><img src="{{ asset("front/images/home-9-370x453.jpg") }}" alt="" width="370" height="453"/>
              <div class="post_cnt">
                <h3>Sensory Counting Games for Kids Blend Fun and Education</h3>
                <time datetime="2015-04-14">April 14, 2018</time>
              </div></a></article>
          <article class="col-sm-6 col-md-4"><a class="post" href="blog-post.html"><img src="{{ asset("front/images/home-10-370x453.jpg") }}" alt="" width="370" height="453"/>
              <div class="post_cnt">
                <h3>The Road to Positive Parenting: Alternatives to "No"</h3>
                <time datetime="2015-04-14">April 16, 2018</time>
              </div></a></article>
          <article class="col-sm-6 col-md-4"><a class="post" href="blog-post.html"><img src="{{ asset("front/images/home-11-370x453.jpg") }}" alt="" width="370" height="453"/>
              <div class="post_cnt">
                <h3>Teach Good Decision-Making Skills and Say Goodbye to Power Struggles</h3>
                <time datetime="2015-04-14">April 18, 2018</time>
              </div></a></article>
          <article class="col-sm-6 col-md-4"><a class="post" href="blog-post.html"><img src="{{ asset("front/images/home-12-370x453.jpg") }}" alt="" width="370" height="453"/>
              <div class="post_cnt">
                <h3>Raise a Grateful Child and Watch Them Become a Caring Adult</h3>
                <time datetime="2015-04-14">April 20, 2018</time>
              </div></a></article>
        </div>
      </div>
    </section>
    <section id="news" class="well-2 center bg-vide novi-vide" data-vide-bg="{{ asset("front/video/video-bg") }}" data-vide-options="posterType: jpg">
        <div class="vide_cnt">
            <div class="container">
                <h2>Innovative methods</h2>
                <hr>
                <h4>Our center uses the most innovative methods of learning that support creativity and inquiry.</h4>
                <div class="button-group"><button class="button button-default button-lg" id="video-play">Video</button></div>
            </div>
        </div>
    </section>
    <section id="pages" class="well-3 bg-pattern center novi-background bg-cover">
        <div class="container">
            <h2>@lang('translate.testimonials')</h2>
            <hr>
            <h4>@lang('translate.test_desc')</h4>
            <div class="row row-fix justify-content-center offset-custom-1">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="owl-carousel" data-items="1" data-dots="false" data-nav="true" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false">
                        @if(count($testimonials) > 0)
                            @foreach($testimonials as $testimonial)
                                <div class="item">
                                    <blockquote>
                                        <img src="{{ asset("storage/testimonial/".$testimonial->photo) }}" alt="" width="204" height="204"/>
                                        <p>
                                            <cite>{{ $testimonial->translate($locale)->name }}</cite>
                                        </p>
                                        <p>
                                            {!! $testimonial->translate($locale)->description !!}
                                        </p>
                                    </blockquote>
                                </div>
                            @endforeach
                        @else
                        <div class="item">
                            <blockquote><img src="{{ asset("front/images/home-04-204x204.jpg") }}" alt="" width="204" height="204"/>
                                <p>
                                    <cite>Kelly Ryan</cite>
                                </p>
                                <p>
                                    <q>Words cannot express the thanks that my family has for each and every Happy Kids early childhood teacher. We enrolled at this nursery center in 2001 when Steven was six weeks old. Since then he has grown and matured into an amazing, intelligent young man.</q>
                                </p><a class="button button-default" href="#">Read more</a>
                            </blockquote>
                        </div>
                        <div class="item">
                            <blockquote><img src="{{ asset("front/images/home-05-204x204.jpg") }}" alt="" width="204" height="204"/>
                                <p>
                                    <cite>Julia Smith</cite>
                                </p>
                                <p>
                                    <q>I enrolled my son in this nursery center when he was 13 months old The Assistant Director answered all of my many questions and once we did drop him off the first day, she was there, with tissues in hand, assuring us that our baby would be OK.</q>
                                </p><a class="button button-default" href="#">Read more</a>
                            </blockquote>
                        </div>
                        <div class="item">
                            <blockquote><img src="{{ asset("front/images/home-06-204x204.jpg") }}" alt="" width="204" height="204"/>
                                <p>
                                    <cite>Jane Williams</cite>
                                </p>
                                <p>
                                    <q>As a parent, I entrust my greatest blessing to the staff at Happy Kids every day, and I am grateful for the loving care and guidance my son receives. The teachers and director look at each child as an individual, with their own strengths and needs.</q>
                                </p><a class="button button-default" href="#">Read more</a>
                            </blockquote>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery gallery-no-padding novi-section">
        <div class="thumb-toggle" data-custom-toggle=".gallery"></div>
        <div class="container-fluid" data-lightgallery="group">
            <div class="row row-30">
                @if(count($gallery) > 0)
                    @foreach($gallery as $value)
                        <div class="col-sm-6 col-md-3">
                            <a class="thumb" href="{{ asset("storage/gallery/".$value->photo) }}" data-lightgallery="item">
                                <img src="{{ asset("storage/gallery/".$value->photo) }}" alt="" width="513" height="513"/>
                                <span class="thumb_overlay novi-background">
                                    <span class="thumb_cnt">
                                        <span class="thumb-icon novi-icon fl-line-ui-heart369"></span>
                                        <span>{{ $value->translate($locale)->title }}</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    @endforeach
                @else
                <div class="col-sm-6 col-md-3">
                    <a class="thumb" href="{{ asset("front/images/gallery-01_original.jpg") }}" data-lightgallery="item">
                        <img src="{{ asset("front/images/gallery-01-513x513.jpg") }}" alt="" width="513" height="513"/>
                        <span class="thumb_overlay novi-background">
                            <span class="thumb_cnt">
                                <span class="thumb-icon novi-icon fl-line-ui-heart369"></span>
                                <span>Committed Childcare</span>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a class="thumb" href="{{ asset("front/images/gallery-02_original.jpg") }}" data-lightgallery="item">
                        <img src="{{ asset("front/images/gallery-02-513x513.jpg") }}" alt="" width="513" height="513"/>
                        <span class="thumb_overlay novi-background">
                            <span class="thumb_cnt">
                                <span class="thumb-icon novi-icon fl-line-ui-heart369"></span>
                                <span>Qualified Teachers</span>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a class="thumb" href="{{ asset("front/images/gallery-03_original.jpg") }}" data-lightgallery="item">
                        <img src="{{ asset("front/images/gallery-03-513x513.jpg") }}" alt="" width="513" height="513"/>
                        <span class="thumb_overlay novi-background">
                            <span class="thumb_cnt">
                                <span class="thumb-icon novi-icon fl-line-ui-heart369"></span>
                                <span>Variety of Programs</span>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a class="thumb" href="{{ asset("front/images/gallery-04_original.jpg") }}" data-lightgallery="item">
                        <img src="{{ asset("front/images/gallery-04-513x513.jpg") }}" alt="" width="513" height="513"/>
                        <span class="thumb_overlay novi-background">
                            <span class="thumb_cnt">
                                <span class="thumb-icon novi-icon fl-line-ui-heart369"></span>
                                <span>Full Accreditation</span>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3"><a class="thumb" href="{{ asset("front/images/gallery-05_original.jpg") }}" data-lightgallery="item"><img src="{{ asset("front/images/gallery-05-513x513.jpg") }}" alt="" width="513" height="513"/><span class="thumb_overlay novi-background"><span class="thumb_cnt"><span class="thumb-icon novi-icon fl-line-ui-heart369"></span><span>Children Development</span></span></span></a>
                </div>
                <div class="col-sm-6 col-md-3"><a class="thumb" href="{{ asset("front/images/gallery-06_original.jpg") }}" data-lightgallery="item"><img src="{{ asset("front/images/gallery-06-513x513.jpg") }}" alt="" width="513" height="513"/><span class="thumb_overlay novi-background"><span class="thumb_cnt"><span class="thumb-icon novi-icon fl-line-ui-heart369"></span><span>Working with Parents</span></span></span></a>
                </div>
                <div class="col-sm-6 col-md-3"><a class="thumb" href="{{ asset("front/images/gallery-07_original.jpg") }}" data-lightgallery="item"><img src="{{ asset("front/images/gallery-07-513x513.jpg") }}" alt="" width="513" height="513"/><span class="thumb_overlay novi-background"><span class="thumb_cnt"><span class="thumb-icon novi-icon fl-line-ui-heart369"></span><span>Annual Summer Activities</span></span></span></a>
                </div>
                <div class="col-sm-6 col-md-3"><a class="thumb" href="{{ asset("front/images/gallery-08_original.jpg") }}" data-lightgallery="item"><img src="{{ asset("front/images/gallery-08-513x513.jpg") }}" alt="" width="513" height="513"/><span class="thumb_overlay novi-background"><span class="thumb_cnt"><span class="thumb-icon novi-icon fl-line-ui-heart369"></span><span>Best Educational Resources</span></span></span></a>
                </div>
                @endif
            </div>
        </div>
    </section>
    <section class="well-4 well-inset-1 bg-default center novi-background custom-bg-image" data-preset='{"title":"Team boxed","category":"team","reload":false,"id":"team-boxed"}'>
        <div class="container">
            <h2>@lang('translate.staff')</h2>
            <hr>
            <h4>Fusce maximus, urna a aliquet eleifend, tortor</h4>
            <div class="row row-30 row-flex">
                @if(count($staff) > 0)
                    @foreach($staff as $staff_item)
                        <div class="col-sm-6 col-md-4">
                            <div class="box-bordered">
                                <img src="{{ asset("storage/staff/".$staff_item->photo) }}" alt="" width="100" height="100"/>
                                <h3>{{ $staff_item->translate($locale)->name }}</h3>
                                <p>{!! $staff_item->translate($locale)->description !!}</p>
                                @if(isset($staff_item->contact))
                                <a href="mailto:#">{{ $staff_item->contact }}</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="col-sm-6 col-md-4">
                    <div class="box-bordered"><img src="{{ asset("front/images/team-1-100x100.jpg") }}" alt="" width="100" height="100"/>
                        <h3>David Austin</h3>
                        <p>Lorem ipsum dolor sit amet consectet molestie lacus. Aenean nonummye.</p><a href="mailto:#">info@demolink.org</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box-bordered"><img src="{{ asset("front/images/team-2-100x100.jpg") }}" alt="" width="100" height="100"/>
                        <h3>Eva Adamson</h3>
                        <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem.</p><a href="mailto:#">info@demolink.org</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box-bordered"><img src="{{ asset("front/images/team-3-100x100.jpg") }}" alt="" width="100" height="100"/>
                        <h3>Thomas Bishop</h3>
                        <p>Aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos.</p><a href="mailto:#">info@demolink.org</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <section class="price-section" id="Price">
        <h2>Price List</h2>
        <div class="price-content">
          <div id="mi-slider" class="mi-slider">
					<ul>
						<li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>124 000 UZS</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>Массаж общий</h1>
                    </div>
                    <div class="price-amount">
                        <strong>50 000 UZS  </strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>$ 54</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>Массаж общий</h1>
                    </div>
                    <div class="price-amount">
                        <strong>50 000 UZS  </strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>$ 54</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>$ 54</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
					</ul>
					<ul>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>$ 54</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>$ 54</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>$ 54</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
					</ul>
					<ul>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>$ 54</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>$ 54</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>$ 54</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
					</ul>
					<ul>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>$ 54</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>$ 54</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
            <li class="price-wrap" id="price-wrap">

                <div class="price-block">
                    <div class="price-title">
                        <h1>baby spa</h1>
                    </div>
                    <div class="price-amount">
                        <strong>$ 54</strong>
                        <small>per month</small>
                    </div>
                    <div class="price-description">
                        <p>Hate dog flop over and missing until dinner time sun bathe make muffins stand in front of the computer screen</p>
                    </div>
                    <div class="price-button">
                        <button id="price-btn" type="button" >get started</button>
                    </div>
                </div>
            </li>
					</ul>
					<nav>
						<a href="#">Shoes</a>
						<a href="#">Accessories</a>
						<a href="#">Watches</a>
						<a href="#">Bags</a>
					</nav>
				</div>

        </div>
    </section>
    <section>
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="100%" height="550px" id="gmap_canvas" src="https://maps.google.com/maps?q=Tashkent%20Yunusobod%20tumani%20Bog'ishamol%20Davlat%20Test%20Markazi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <a href="https://www.utilitysavingexpert.com">Utility Saving Expert</a>
            </div>
        </div>
    </section>

    <!-- Page Footer-->
    <footer id="contact-us" class="bg-default novi-background bg-cover">
        <div class="container center">
            <section class="well-4 bg-default novi-background bg-cover" data-preset='{"title":"Contact form with info","category":"forms","reload":true,"id":"contact-form-with info"}'>
                <div class="container">
                    <div class="row row-60 justify-content-between">
                        <div class="col-lg-6">
                            <h2>Contact form</h2>
                            <hr>
                            <h4>Lorem ipsum dolor sit amet consectetuer adipisc</h4>
                            <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                                <div class="row row-14 row-fix">
                                    <div class="col-sm-6">
                                        <div class="form-wrap">
                                            <label class="form-label" for="contact-name-3">Name</label>
                                            <input class="form-input" id="contact-name-3" type="text" name="name" data-constraints="@Required">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-wrap">
                                            <label class="form-label" for="contact-phone-3">Phone</label>
                                            <input class="form-input" id="contact-phone-3" type="text" name="phone" data-constraints="@Required @PhoneNumber">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-wrap">
                                            <label class="form-label" for="contact-email-3">E-Mail</label>
                                            <input class="form-input" id="contact-email-3" type="email" name="email" data-constraints="@Required @Email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-wrap">
                                            <label class="form-label" for="contact-address-3">Address</label>
                                            <input class="form-input" id="contact-address-3" type="text" name="address">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-wrap">
                                            <label class="form-label" for="contact-message-3">Message</label>
                                            <textarea class="form-input" id="contact-message-3" name="message" data-constraints="@Required"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-button group-sm text-center">
                                    <button class="button button-2" type="submit">Send</button>
                                    <button class="button button-default" type="reset">Clear</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-xl-5">
                            <div class="info-block">
                                <h2>Contact information</h2>
                                <hr>
                                <p>You can contact us any way that is convenient for you. We are available 24/7 via fax or email. You can also visit us personally.</p>
                                <address>9863 - 9867 Mill Road,<br> Cambridge, MG09 99HT</address>
                                <div class="info-list">
                                    <dl>
                                        <dt>Freephone:</dt>
                                        <dd><a href="tel:#">+1 800 559 6580</a></dd>
                                    </dl>
                                    <dl>
                                        <dt>Telephone:</dt>
                                        <dd><a href="tel:#">+1 800 603 6035</a></dd>
                                    </dl>
                                </div>
                                <ul class="inline-list">
                                    <li><a class="icon icon-creative novi-icon fa fa-google-plus" href="#"></a></li>
                                    <li><a class="icon icon-creative novi-icon fa fa-pinterest" href="#"></a></li>
                                    <li><a class="icon icon-creative novi-icon fa fa-twitter" href="#"></a></li>
                                    <li><a class="icon icon-creative novi-icon fa fa-facebook" href="#"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="copyright"><span>Babby island</span><span>&nbsp;&copy;&nbsp;</span><span class="copyright-year"></span><span>.&nbsp;</span><a href="privacy-policy.html">Privacy Policy</a><span>. Designed&nbsp;by&nbsp;<a href="https://codestudio.uz" target="_blank" >CodeStudio</a></span></div>
        </div>
    </footer>
</div>

<div class="snackbars" id="form-output-global"></div>

<div class="Modal-window" id="modal-video">
<div class="cont-mod-video">
  <span id="close" class="closes">&times</span>
<iframe id="youtube" width="100%" height="100%" src="https://www.youtube.com/embed/boY6FvdnrBQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="{{ asset("front/js/core.min.js") }}"></script>
<script src="{{ asset("front/js/script.js") }}"></script>
<script src="{{ asset("front/js/myscript.js") }}"></script>
<script src="{{ asset("front/js/jquery.catslider.js") }}"></script>
<script>
  $(function() {

    $( '#mi-slider' ).catslider();

  });
</script>
</body>
</html>
