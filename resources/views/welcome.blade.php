@extends('layouts.app')

@section('content')
<section class="slider-area hero-overly">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9 col-md-10 col-sm-9">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInLeft" data-delay="0.2s">SHORE - SHOP & SHOES CARE.</h1>
                            <p data-animation="fadeInLeft" data-delay="0.4s">Shore is the space for anything you need about shoes. (Purchase and Maintenance)</p>
                            <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Explore Services</a>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </div>
</section>
<!-- slider Area End-->
<!--? Services Area Start -->
<section class="services-area pt-top border-bottom pb-20 mb-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <!-- <span class="element">Our Process</span> -->
                    <h2>OUR PRODUCT</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product-card text-center">
                    <div class="product-image">
                        <img src="{{ asset('assets/img/product/Pegasuswhite.jpeg') }}" style="width: 200px;" alt="Pegasus White - paint">
                    </div>
                    <div class="product-info">
                        <h5><a href="#">Pegasus White - paint</a></h5>
                        <p>24K</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product-card text-center">
                    <div class="product-image">
                        <img src="{{ asset('assets/img/product/fabricsand.jpeg') }}" style="width: 200px;" alt="Fabric Sand - paint">
                    </div>
                    <div class="product-info">
                        <h5><a href="#">Fabric Sand - paint</a></h5>
                        <p>24K</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product-card text-center">
                    <div class="product-image">
                        <img src="{{ asset('assets/img/product/chocolate.jpeg') }}" style="width: 200px;" alt="Chocolate - Deodorizer">
                    </div>
                    <div class="product-info">
                        <h5><a href="#">Chocolate - Deodorizer</a></h5>
                        <p>32K</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product-card text-center">
                    <div class="product-image">
                        <img src="{{ asset('assets/img/product/Blackberry.jpeg') }}" style="width: 200px;" alt="Deodorizer - Blackberry">
                    </div>
                    <div class="product-info">
                        <h5><a href="#">Deodorizer - Blackberry</a></h5>
                        <p>32K</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--? About Area  -->
<section class="about-area2 pb-bottom mt-30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <!-- about-img -->
                <div class="about-img ">
                    <img src="{{ asset('assets/img/abt.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="about-caption mb-50">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-25">
                        <h2>About Us</h2>
                    </div>
                    <p class="mb-20">
                        Shore adalah layanan cuci sepatu berbasis web online yang menyediakan berbagai layanan seperti deep clean, fast clean, unyellowing repair dan repaint.
                    </p>
                    <!-- <p class="mb-30">Read More</p> -->

                    <a href="#" class="btn">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection