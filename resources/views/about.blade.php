@extends('layouts.app')

@section('content')
<section class="about-area2 pb-bottom mt-40">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <!-- about-img -->
                <div class="about-img ">
                    <img src="{{ asset('assets/img/abt.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-caption mb-50">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-25">
                        <h2>Why Choose Shore?</h2>
                    </div>
                    <p class="mb-20">
                        Shore - Shop and Shoes Care adalah jasa perawatan premium sepatu yang berada di Surabaya dan jasa perawatan premium sepatu yang berbasis media sosial. Kami menangani perawatan sepatu secara profesional, dengan teknik khusus, serta menggunakan alat dan bahan premium untuk melakukan perawatan.
                    </p>
                    <p class="mb-20">
                        Kami memberikan berbagai macam layanan untuk perawatan barang kesayangan anda yang akan dikerjakan oleh tim kami yang sudah berpengalaman dan professional.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider Area End-->
<section class="about-area2 pb-bottom mt-40">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <!-- <span class="element">Our Process</span> -->
                    <h2>OUR SERVICE</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <div class="product-card text-center">
                    <div class="product-image">
                        <img src="{{ asset('assets/img/fc.webp') }}" style="width: 200px;" alt="Fast Cleaning">
                    </div>
                    <div class="product-info">
                        <h5>Fast Cleaning</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="product-card text-center">
                    <div class="product-image">
                        <img src="{{ asset('assets/img/dc.webp') }}" style="width: 200px;" alt="Deep Cleaning">
                    </div>
                    <div class="product-info">
                        <h5>Deep Cleaning</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
</section>
@endsection