@extends('user.layout.template')

@section('title', 'Content')
@section('title_page', 'Content')
@section('desc_page', '')
@section('content')
@section('styles')
    <style>
        #like-button {
        color: #888;
        font-size: 1em;
        font-family: "Heebo", sans-serif;
        background-color: transparent;
        border: 0.1em solid;
        border-radius: 1em;
        padding: 0.333em 1em 0.25em;
        line-height: 1.2em;
        box-shadow: 0 0.25em 1em -0.25em;
        cursor: pointer;
        transition: color 150ms ease-in-out, background-color 150ms ease-in-out, transform 150ms ease-in-out;
        outline: 0;
        
        }
        #like-button:hover {
        color: indianred;
        }
        #like-button:active {
        transform: scale(0.95);
        }
        #like-button.selected {
        color: #fff;
        background-color: indianred;
        border-color: indianred;
        }
        #like-button .heart-icon {
        display: inline-block;
        fill: currentColor;
        width: 0.8em;
        height: 0.8em;
        margin-right: 0.2em;
        }

        .feedback-container {
        background-color: #8bcff1;
        width: 400px;
        height: 200px;
        margin-top: 15px;
        margin-bottom: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        position: relative;
        }

        .emoji-container {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 20%;
        /* background-color: #ffa6ca; */
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        overflow: hidden;
        /* will hide emojis outside of the container i.e. the other emojis */
        }

        .fa-regular {
        margin: 1px;
        transform: translateX(0);
        transition: transform 0.2s;
        }

        .fa-star{
            color: #43474b;
            cursor: pointer;
        }

        .rating-container{
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 20%;
        }

        .fa-star.active{
            color: #fbc200;
        }

        .social-btn-sp #social-links {

        margin: 0 auto;

        max-width: 500px;

        }

        .social-btn-sp #social-links ul li {

        display: inline-block;

        }          

        .social-btn-sp #social-links ul li a {

        padding: 15px;

        border: 1px solid #ccc;

        margin: 1px;

        font-size: 30px;

        }
        .social-btn-sp {
    display: flex;
    justify-content: center; /* Center align the social icons */
    flex-wrap: wrap;
    margin-top: 20px;
}

.social-btn-sp #social-links ul {
    padding: 0;
    list-style: none;
}

.social-btn-sp #social-links ul li {
    display: inline-block;
    margin: 5px;
}

.social-btn-sp #social-links ul li a {
    padding: 10px;
    border: 1px solid #ccc;
    margin: 1px;
    font-size: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.social-btn-sp #social-links ul li a:hover {
    background-color: #f0f0f0; /* Add a hover effect */
}

/* Responsive Design */
@media (max-width: 768px) {

    .social-btn-sp {
        flex-direction: column;
        align-items: center;
    }

    .social-btn-sp #social-links ul li a {
        padding: 8px;
        font-size: 25px;
    }
}

@media (max-width: 480px) {
    .emoji-container {
        width: 40px;
        height: 40px;
    }

    .social-btn-sp #social-links ul li a {
        padding: 5px;
        font-size: 20px;
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
                    <h1>Empower your system with all-in-one<span> Knowledge Hub</span></h1>
                    <p>Selamat Datang di Knowledge Management System Kementerian Perhubungan bernama<br/> <b>Transportation Knowledge-Hub System (Trak-Hubs)</b></p>
                    <div class="d-flex">
                        <a href="#about" class="btn-get-started">Get Started</a>
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center">
                            <i class="bi bi-play-circle"></i><span>Watch Video</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" id="data-konten">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3" id="blog-konten">
                        <img class="img-fluid w-100" src="img/news-700x435-2.jpg" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-3">
                                {{-- <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span>January 01, 2045</span> --}}
                            </div>
                            <div>
                                <h3 class="mb-3">Est stet amet ipsum stet clita rebum duo</h3>
                                <p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut
                                    magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet
                                    amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at
                                    sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et
                                    aliquyam ut et vero clita. Diam sea sea no sed dolores diam nonumy, gubergren
                                    sit stet no diam kasd vero.</p>
                                <p>Voluptua est takimata stet invidunt sed rebum nonumy stet, clita aliquyam dolores
                                    vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit
                                    nonumy kasd diam dolores, sanctus lorem kasd duo dolor dolor vero sit et. Labore
                                    ipsum duo sanctus amet eos et. Consetetur no sed et aliquyam ipsum justo et,
                                    clita lorem sit vero amet amet est dolor elitr, stet et no diam sit. Dolor erat
                                    justo dolore sit invidunt.</p>
                                <h4 class="mb-3">Est dolor lorem et ea</h4>
                                <img class="img-fluid w-50 float-left mr-4 mb-2" src="img/news-500x280-1.jpg">
                                <p>Diam dolor est labore duo invidunt ipsum clita et, sed et lorem voluptua tempor
                                    invidunt at est sanctus sanctus. Clita dolores sit kasd diam takimata justo diam
                                    lorem sed. Magna amet sed rebum eos. Clita no magna no dolor erat diam tempor
                                    rebum consetetur, sanctus labore sed nonumy diam lorem amet eirmod. No at tempor
                                    sea diam kasd, takimata ea nonumy elitr sadipscing gubergren erat. Gubergren at
                                    lorem invidunt sadipscing rebum sit amet ut ut, voluptua diam dolores at
                                    sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam
                                    dolores takimata dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna
                                    sea at sed et eos. Accusam eirmod kasd lorem clita sanctus ut consetetur et. Et
                                    duo tempor sea kasd clita ipsum et.</p>
                                <h5 class="mb-3">Est dolor lorem et ea</h5>
                                <img class="img-fluid w-50 float-right ml-4 mb-2" src="img/news-500x280-2.jpg">
                                <p>Diam dolor est labore duo invidunt ipsum clita et, sed et lorem voluptua tempor
                                    invidunt at est sanctus sanctus. Clita dolores sit kasd diam takimata justo diam
                                    lorem sed. Magna amet sed rebum eos. Clita no magna no dolor erat diam tempor
                                    rebum consetetur, sanctus labore sed nonumy diam lorem amet eirmod. No at tempor
                                    sea diam kasd, takimata ea nonumy elitr sadipscing gubergren erat. Gubergren at
                                    lorem invidunt sadipscing rebum sit amet ut ut, voluptua diam dolores at
                                    sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam
                                    dolores takimata dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna
                                    sea at sed et eos. Accusam eirmod kasd lorem clita sanctus ut consetetur et. Et
                                    duo tempor sea kasd clita ipsum et. Takimata kasd diam justo est eos erat
                                    aliquyam et ut.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="feedback-container">
                               
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="container mt-4" id="share-konten">
                                <h2 class="mb-5 text-center">Share konten ini</h2>
                                <div class="social-btn-sp">

                                    {{-- {!! $shareComponent !!} --}}
                    
                                </div>
                                
                            </div> 
                        </div>
                        <div id="hidden-share-buttons" style="display:none;">
                            {!! 
                            Share::page(
                                request()->fullUrl()
                            )->facebook()
                            ->twitter()
                            ->linkedin()
                            ->telegram()
                            ->whatsapp()
                            !!}
                        </div>
                        
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    <div class="bg-light mb-3" id="komentar-konten" style="padding: 30px;">
                        
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="bg-light mb-3" id="submit-komentar" style="padding: 30px;">
                        <h3 class="mb-4">Leave a comment</h3>
                        <form id="tambah-komentar">
                            <div class="form-group">
                                {{-- <label for="name">Name *</label> --}}
                                <input type="hidden" class="form-control" data-bind-user-id value="" name="user_id">
                                <input type="hidden" class="form-control" data-bind-contributor-id value="" name="contributor_id">
                            </div>

                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="komentar" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave a comment"
                                    class="btn btn-primary font-weight-semi-bold py-2 px-3">
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">
                    <!-- Social Follow Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Follow Us</h3>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #39569E;">
                                <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #52AAF4;">
                                <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #0185AE;">
                                <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #C8359D;">
                                <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #DC472E;">
                                <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #1AB7EA;">
                                <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tranding</h3>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-1.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-2.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-3.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-4.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-5.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Tags Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tags</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Sports</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Technology</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Entertainment</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Lifestyle</a>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    </div>
</main>


@endsection
@section('scripts')
    <script>
        function getSlugFromUrl() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('slug');
        }
        document.addEventListener('DOMContentLoaded', function() {
            const slugName = getSlugFromUrl();
           
            loadContent(slugName);

        });

        function loadContent(slug) {
            let blogContent = $("#blog-konten").empty();
            let contentHtml = '';
            let selected = false;
            const url = `${baseUrl}/api/v1/getBlog/${slug}`;

            ajaxData(url, 'GET', [], function(resp) {
                let userId = session("userId"); 
                let roleUser = session("role");
                let userSeeker = session("data-role-verificator");
                let checkRole = roleUser == "user" || userSeeker == "ada";
                let getLiked = resp.data.likes.some((like) => like.user_id == userId && like.liked == true);
                let checkRatingUser = resp.data.ratings.some((rating) => rating.user_id == userId);
                let getRating = 0;
                if (checkRatingUser) {
                    resp.data.ratings.forEach(element => {
                        if (element.user_id == userId ) {
                            getRating = element.rating;
                        }
                    });
                }
                
                $('#submit-komentar').find(`[data-bind-user-id]`).val(userId).attr('value', userId);
                $('#submit-komentar').find(`[data-bind-contributor-id]`).val(resp.data.id).attr('value', resp.data.id);

                let kontenItem = `
                    <img class="img-fluid w-100" src="${resp.data.image_thumbnail[0].url}" style="object-fit: cover;">
                    <div class="overlay position-relative bg-light">
                        <div class="mb-3">
                            <a href="">${resp.data.kategori.nama_kategori}</a>
                            <span class="px-1">/</span>
                            <span>
                                <button type="button" id="like-button" class="${getLiked ? `selected` : ''}">
                                <svg class="heart-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M91.6 13A28.7 28.7 0 0 0 51 13l-1 1-1-1A28.7 28.7 0 0 0 8.4 53.8l1 1L50 95.3l40.5-40.6 1-1a28.6 28.6 0 0 0 0-40.6z"/></svg>
                                Like
                                </button>
                            </span>
                            
                            
                        </div>
                        <div>
                            ${resp.data.dekskripsi}
                        </div>
                    </div>
                `;

                blogContent.append(kontenItem);
                
                       
                let likeButton = document.getElementById('like-button');
                likeButton.addEventListener('click', function() {

                    if (empty(session("isLogin"))) {
                        toast("harus login terlebih dahulu", 'danger');
                        setTimeout(function(){
                            deleteSession();
                        }, 300);
                    } else {
                        if(checkRole) {
                            window.lb = likeButton;
                            let selected = likeButton.classList.toggle('selected');
                            ajaxData(`${baseUrl}/api/v1/like`, 'PUT', {
                                'userId' : userId,
                                'liked': selected, 
                                'contributor_id': resp.data.id,
                                'slug': slug
                            }, function(resp) {
                                console.log(resp);
                            }, function(data) {
                                
                            });
                        } else {
                            toast("Anda bukan user seeker", 'danger');
                        }
                    }

                });

                let ratingItem = `
                       
                            <div class="emoji-container">
                                <i class="fa-regular fa-face-angry fa-3x"></i>
                                <i class="fa-regular fa-face-frown fa-3x"></i>
                                <i class="fa-regular fa-face-meh fa-3x"></i>
                                <i class="fa-regular fa-face-smile fa-3x"></i>
                                <i class="fa-regular fa-face-laugh fa-3x"></i>
                            </div>
                            <div class="rating-container">
                                <i class="fa-solid fa-star fa-2x"></i>
                                <i class="fa-solid fa-star fa-2x"></i>
                                <i class="fa-solid fa-star fa-2x"></i>
                                <i class="fa-solid fa-star fa-2x"></i>
                                <i class="fa-solid fa-star fa-2x"></i>
                            </div>
                        
                ` 
               $('#data-konten').find('.feedback-container').html(ratingItem);


                const starsEl = document.querySelectorAll(".fa-star");
                const emojisEl = document.querySelectorAll(".fa-regular");
                const colorArray = ["red", "orange", "yellow", "blue", "green"];
                
                checkRatingUser && checkRole ? updateRating(starsEl, emojisEl, colorArray, getRating) : updateRating(starsEl, emojisEl, colorArray, 0);

                starsEl.forEach((starEl, index) => {
                starEl.addEventListener("click", () => {
                    if (empty(session("isLogin"))) {
                            toast("harus login terlebih dahulu", 'danger');
                            setTimeout(function(){
                                deleteSession();
                            }, 300);
                    } else {
                        if(checkRole) { 
                            updateRating(starsEl, emojisEl, colorArray, index);
                            ajaxData(`${baseUrl}/api/v1/rating`, 'PUT', {
                                'userId' : userId,
                                'rating': index , 
                                'contributor_id': resp.data.id,
                            }, function(resp) {
                                console.log(resp);
                            }, function(data) {
                                
                            });

                        } else {
                            toast("Anda bukan user seeker", 'danger');
                        }   
                    } 
                });
                });
                
                $("#share-konten .social-btn-sp").empty();
    
                let itemShareKonten = $("#hidden-share-buttons").html();
    
                $("#share-konten .social-btn-sp").html(itemShareKonten);
                $(".social-btn-sp a[href*='facebook.com']").attr('data-platform', 'facebook');
                $(".social-btn-sp a[href*='twitter.com']").attr('data-platform', 'twitter');
                $(".social-btn-sp a[href*='linkedin.com']").attr('data-platform', 'linkedin');
                $(".social-btn-sp a[href*='telegram.org']").attr('data-platform', 'telegram');
                $(".social-btn-sp a[href*='whatsapp.com']").attr('data-platform', 'whatsapp');
                
                $("#share-konten").on("click", ".social-btn-sp a", function(e) {
                    if (empty(session("isLogin"))) {
                            toast("harus login terlebih dahulu", 'danger');
                            setTimeout(function(){
                                deleteSession();
                            }, 300);
                    } else {
                        if(checkRole) { 
                            e.preventDefault(); 

                            let platform = $(this).data('platform');
                            let shareUrl = $(this).attr('href'); 
                            
                            $.ajax({
                                url: `${baseUrl}/api/v1/share`,  
                                type: 'POST',                   
                                data: {                         
                                    'userId': userId,
                                    'contributor_id': resp.data.id, 
                                    'isShare': true,
                                    'platform': platform      
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                                },
                                success: function(response) {
                                    window.open(shareUrl, '_blank');
                                },
                                error: function(xhr, status, error) {
                                    console.error('AJAX error:', error);
                                }
                            });
                        } else {
                            toast("Anda bukan user seeker", 'danger');
                        }
                    }
                    
                });
                
                let komentarKonten = $("#komentar-konten").empty();
                let dataKomentar = resp.data.komentar;

                let headerKomentar = `
                    <h3 class="mb-4">${dataKomentar == null || dataKomentar.length === 0 ? `0 Comments` : dataKomentar.length + ` Comments`}</h3>
                `;
                komentarKonten.append(headerKomentar);

                if (dataKomentar == null || dataKomentar.length === 0) {
                    let noComments = `<div class="media-body">No comments yet.</div>`;
                    komentarKonten.append(noComments);
                } else {
                   
                    dataKomentar.forEach(comment => {
                        let komentarItem = `
                            <div class="media-body">
                                <h6><a href="#">${comment.user.name}</a> <small><i>${formatDate(comment.created_at)}</i></small></h6>
                                <p>${comment.komentar}</p>
                            </div>
                        `;
                        komentarKonten.append(komentarItem);
                    });
                }
                
            });
        }

        $("#tambah-komentar").on('submit', function(e) {
            e.preventDefault();

            let url = `${baseUrl}/api/v1/comment`;
            let userId = $('input[name="user_id"]').val();        
            let contributorId = $('input[name="contributor_id"]').val();
            let komentar = $('textarea[name="komentar"]').val(); 
            const data = {
                user_id : userId,
                contributor_id:  contributorId,
                komentar : komentar,
            }

            let komentarKonten = $("#komentar-konten").empty();
            komentarKonten.append(`<div class="loading-spinner text-center">
                                    <p>Submitting your comment...</p>
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>`);

            setTimeout(function() {
                $(".loading-spinner").remove();

                ajaxData(url, 'POST', data, function(resp) {
                
                    toast("Anda sudah berkomentar");

                
                    let dataKomentar = resp.length
                    let headerKomentar = `<h3 class="mb-4">${dataKomentar == null ? `0 Comments` : dataKomentar + ` Comments`}</h3>`;
                    komentarKonten.append(headerKomentar);
                    
                    resp.forEach(comment => {
                        let komentarItem = dataKomentar == null ? 
                            `<div class="media-body"> </div>` : 
                            `<div class="media-body">
                                <h6><a href="">${comment.user.name}</a> <small><i>${formatDate(comment.created_at)}</i></small></h6>
                                <p>${comment.komentar}</p> <!-- Example of how you might append the new comment -->
                            </div>`;
        
                        komentarKonten.append(komentarItem);
                    });


                }, function(data) {
                    $(".loading-spinner").remove();
                    komentarKonten.append(`<p class="text-danger">Error submitting your comment. Please try again later.</p>`);
                });

            }, 3000);
        });

        function formatDate(dateString) {
            const months = [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];

            const date = new Date(dateString);

            const day = date.getUTCDate();
            const month = months[date.getUTCMonth()];
            const year = date.getUTCFullYear();

            return `${day} ${month} ${year}`;
        }

        function updateRating(starsEl, emojisEl, colorArray,index) {
        starsEl.forEach((starEl, idx) => {
            
            
            if (idx < index + 1) {
            starEl.classList.add("active");
            } else {
            starEl.classList.remove("active");
            }
        });

        emojisEl.forEach((emojiEl) => {
            emojiEl.style.transform = `translateX(-${index * 50}px)`;
            emojiEl.style.color = colorArray[index];
        });
        }


    </script>
@endsection