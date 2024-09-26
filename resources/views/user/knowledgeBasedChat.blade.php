New! Keyboard shortcuts … 
Drive keyboard shortcuts have been updated to give you first-letters navigation

@extends('user.layout.template')

@section('title', 'layanan-transportasi')
@section('title_page', 'layanan-transportasi')
@section('desc_page', '')
@section('content')
@section('styles')
    <style>
        .header-data {
            background-color: #3C3B6E;
            padding: 20px;
            text-align: center;
            color: white;
            font-weight: bold;
            border-radius: 10px 10px 10px 10px;
            margin-bottom: 40px;
        }

        .header-data img {
            height: 40px;
            margin-right: 10px;
        }

        .title-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #F48024;
            color: white;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }

        .title-container h1 {
            font-size: 1.5rem;
            margin: 0;
        }

        .iframe-container {
            background-color: #FFC107;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.25rem;
            color: black;
        }

        .footer-iframe {
            background-color: #3C3B6E;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: space-around;
            align-items: center;
            border-radius: 10px 10px 10px 10px;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .footer-iframe img {
            height: 40px;
        }

        .powered-by {
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .title-container {
                flex-direction: column;
                text-align: center;
            }

            .footer-iframe {
                flex-direction: column;
                text-align: center;
            }

            .footer-iframe img {
                margin-bottom: 10px;
            }
        }

        @media (max-width: 576px) {
            .header-data img {
                height: 30px;
            }

            .footer-iframe img {
                height: 30px;
            }

            .title-container h1 {
                font-size: 1.25rem;
            }

            .iframe-container {
                height: 200px;
                font-size: 1rem;
            }
        }
    </style>
@endsection

<main class="main">
<!-- Hero Section -->
<section id="hero" class="hero section dark-background">
    <img src="{{asset('user/assets/img/hero-bg-2.jpg')}}" alt="" class="hero-bg">

    <div class="container">
        <div class="row gy-4 justify-content-between">
            <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                <img src="{{asset('user/assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-in">
                <h1>Fitur Knowledge-based Chat <span>Bidang Transportasi</span></h1>
                <p>Fitur ini untuk mempermudah sivitas Kemenhub dalam menelusur informasi dan pengetahuan berbasis chat dengan pengetahuan spesifik</p>
                <p>Powered by:<br/>
                <img src="{{ asset('img/logo/logo-baketrans.png') }}" alt="Baketrans Kemenhub" width="70%"><br/>
                <img src="{{ asset('img/logo/jdih.png') }}" alt="Strategi Pusdatin Kemenhub" width="40px">
                <img src="{{ asset('img/logo/logo-kemenhub.png') }}" alt="JDIH Kemenhub" width="40px">JDIH Kemenhub</p>
    
    
    
    			<!--<div class="d-flex">
                    <a href="#about" class="btn-get-started">Get Started</a>
                    <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center">
                        <i class="bi bi-play-circle"></i><span>Watch Video</span>
                    </a>
                </div>-->
    
    
            </div>
        </div>
    </div>
</section>
<div class="container">
<p>
Silahkan akses panduan Knowledge-based chat berbasis data JDIH Kemenhub di <a href="https://docs.google.com/document/d/14F_Q9RKv94QpgOtIHWSOmrUyPsBxTBZO/edit?usp=sharing&ouid=106443721771904639749&rtpof=true&sd=true" target="_blank">link ini</a>               
</p>
</div>
<section>
<iframe
	src="https://kms2024-rag-openai-gr.hf.space"
	frameborder="0"
	width="100%"
	height="450"
></iframe>
    </section>
    
</main>
@endsection
