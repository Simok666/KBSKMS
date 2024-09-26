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
                <h1>Analisis Sentimen <span>Layanan Transportasi</span></h1>
                <p>Fitur ini digunakan untuk mengetahui sentimen masyarakat terkait sarana transportasi berdasarkan titik simpul sarana sebagai pendukung rekomendasi kebijakan</p>
                <p>Powered by:<br/>
                <img src="{{ asset('img/logo/logo-baketrans.png') }}" alt="Baketrans Kemenhub" width="70%"><br/>
                <img src="{{ asset('img/logo/logo-kemenhub.png') }}" alt="Pusdatin Kemenhub" width="40px">Pusdatin Kemenhub</p>
    
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

<section>
<div class='tableauPlaceholder' id='viz1726558049962' style='position: relative'><noscript><a href='#'><img alt='Dashboard_BKT_ASIT_V1 ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Da&#47;Dashboard_SA_Infra_kemenhub&#47;Dashboard_BKT_ASIT_V1&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='Dashboard_SA_Infra_kemenhub&#47;Dashboard_BKT_ASIT_V1' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Da&#47;Dashboard_SA_Infra_kemenhub&#47;Dashboard_BKT_ASIT_V1&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='language' value='en-US' /><param name='filter' value='publish=yes' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1726558049962');                    var vizElement = divElement.getElementsByTagName('object')[0];                    if ( divElement.offsetWidth > 800 ) { vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.75)+'px';} else if ( divElement.offsetWidth > 500 ) { vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.75)+'px';} else { vizElement.style.width='100%';vizElement.style.height='2077px';}                     var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script>
</section>
    
</main>
@endsection