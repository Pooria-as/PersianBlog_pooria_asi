
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/theme/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Blogger</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="/theme/css/linearicons.css">
    <link rel="stylesheet" href="/theme/css/font-awesome.min.css">
    <link rel="stylesheet" href="/theme/css/bootstrap.css">
    <link rel="stylesheet" href="/theme/css/owl.carousel.css">
    <link rel="stylesheet" href="/theme/css/main.css">

</head>
<body>

<!-- Start Header Area -->
@include("theme.partialviews.topNavtheme")

<!-- End Header Area -->

<!-- Start top-section Area -->
<section class="top-section-area section-gap">
    <div class="container">
        <div class="row justify-content-start align-items-center d-flex">
            <div class="col-lg-8 top-left">
                <h1 class="text-white mb-20">آرشیو خبر ها</h1>
                <ul>
                    <li><a href="index.html">صفحه اصلی </a><span class="lnr lnr-arrow-right"></span></li>
                    <li><a href="category.html">آرشیو خبر ها </a></li>
                </ul>
            </div>
        </div>
    </div>
    <br>
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-lg-8">
               
                    <p class="mt-20 text-center text-white">جستجوی خبرها از بین بی نهایت خبر</p>
                </div>
            </div>
        </div>
</section>

<!-- End top-section Area -->


<!-- Start post Area -->
<div class="post-wrapper pt-100">
    <!-- Start post Area -->
    <section class="post-area">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-8">
                    <div class="post-lists search-list">
          
                        @forelse ($posts as $post)
                        <div class="single-list flex-row d-flex">
                            <div class="thumb">
                             
                                <img src="/{{$post->image}}" width="50" alt="">
                            </div>
                            <div class="detail">
                                <a href="{{route("single",$post->slug)}}"><h4 class="pb-20">
                                        {{$post->title}}
                                    <br>
                            </h4></a>
                                <p>
                                    {{$post->description}}
                                </p>
                                <p class="footer pt-20">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <a href="#">{{$post->like}} لایک</a> <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i> <a
                                        href="#">{{$post->comments->count()}} نظر</a>
                                </p>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-danger" role="alert">
                            <h1>
                                متاسفانه خبری یافت نشد
                            </h1>
                        </div>
                        @endforelse
                       
                    
                    </div>
                </div>
                <div class="col-lg-4 sidebar-area">
              
                    @include("theme.partialviews.sidebarTheme")
                </div>
            </div>
        </div>
    </section>
    <!-- End post Area -->
</div>
<!-- End post Area -->

<!-- start footer Area -->
<footer class="footer-area section-gap" >
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-12">
                <div class="single-footer-widget">
                    <h6>خبر های برتر</h6>
                    <ul class="footer-nav">
                        <li><a href="#">مدیریت سایت</a></li>
                        <li><a href="َِ#">مدیریت</a></li>
                        <li><a href="elements.html">ابزار </a></li>
                        <li><a href="#">لورم ایپسوم</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6  col-md-12">
                <div class="single-footer-widget newsletter">
                    <h6>خبرنامه</h6>
                    <p>ایمیل خود را وارد کنید تا آخرین خبرها را در ایمیل خود داشته باشید</p>
                    <div id="mc_embed_signup">
                        <form target="_blank" novalidate="true"
                              action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                              method="get" class="form-inline">

                            <div class="form-group row" style="width: 100%">
                                <div class="col-lg-8 col-md-12">
                                    <input name="EMAIL" placeholder="ایمیل خود را وارد کنید"
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                               type="text">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12">
                                    <button class="nw-btn primary-btn">عضویت<span
                                            class="lnr lnr-arrow-right"></span></button>
                                </div>
                            </div>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-md-12">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">اینستگرام ما</h6>
                    <ul class="instafeed d-flex flex-wrap">
                        <li><img src="/theme/img/i1.jpg" alt=""></li>
                        <li><img src="/theme/img/i2.jpg" alt=""></li>
                        <li><img src="/theme/img/i3.jpg" alt=""></li>
                        <li><img src="/theme/img/i4.jpg" alt=""></li>
                        <li><img src="/theme/img/i5.jpg" alt=""></li>
                        <li><img src="/theme/img/i6.jpg" alt=""></li>
                        <li><img src="/theme/img/i7.jpg" alt=""></li>
                        <li><img src="/theme/img/i8.jpg" alt=""></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row footer-bottom d-flex justify-content-between">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <p class="col-lg-8 col-sm-12 footer-text">فارسی سازی این سایت توسط سبحان علیدوست انجام شده است و برای سفارش
                کارهای بیششتر به این ایمیل sbn.alidoost@gmail.com پیام ارسال کنید</p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <div class="col-lg-4 col-sm-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- End footer Area -->
<script src="/theme/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="/theme/js/vendor/bootstrap.min.js"></script>
<script src="/theme/js/jquery.ajaxchimp.min.js"></script>
<script src="/theme/js/parallax.min.js"></script>
<script src="/theme/js/owl.carousel.min.js"></script>
<script src="/theme/js/jquery.magnific-popup.min.js"></script>
<script src="/theme/js/jquery.sticky.js"></script>
<script src="/theme/js/main.js"></script>
</body>
</html>