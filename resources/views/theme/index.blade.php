
<!DOCTYPE html>
<html lang="fa">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="theme/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>خبرنامه</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="theme/css/linearicons.css">
    <link rel="stylesheet" href="theme/css/font-awesome.min.css">
    <link rel="stylesheet" href="theme/css/bootstrap.css">
    <link rel="stylesheet" href="theme/css/owl.carousel.css">
    <link rel="stylesheet" href="theme/css/main.css">

</head>
<body>

<!-- Start Header Area -->
@include("theme.partialviews.topNavtheme")

<!-- End Header Area -->

<!-- start banner Area -->
<section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="theme/img/header-bg.jpg" dir="rtl">
    <div class="overlay-bg overlay"></div>
    <div class="container">
        <div class="row fullscreen">
            <div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
                <div class="container">
                    <div class="row justify-content-center align-items-center d-flex">
                        <div class="col-lg-8">
                                  <form action="{{route("archive")}}" method="GET">
                                    <div id="imaginary_container">
                                <div class="input-group stylish-input-group">

                                      <input type="text" class="form-control" placeholder="دنبال چه خبری هستی..."
                                      name="title" value="{{request()->query("title")}}">
                           
                                   <button type="submit" class="btn btn-info">
                                     جست و جو
                                   </button>
                                
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- End banner Area -->


<!-- Start category Area -->
<section class="category-area section-gap" id="news">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">جدیدترین خبرهای ارسالی</h1>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با تولید سادگی
                        نامفهوم از صنعت چاپ</p>
                </div>
            </div>
        </div>
        <div class="active-cat-carusel">
        @forelse ($lastesNews as $item)
        <div class="item single-cat">
            <img dir="rtl" src="/{{$item->image}}" alt="">
            <p class="date">
               {{ \Morilog\Jalali\Jalalian::forge($item->created_at)->format('%B %d، %Y')}}
            </p>
            <h4 dir="rtl"><a href="{{route("single",$item->slug)}}">
            {{$item->title}}    
            </a></h4>
        </div>
        
        @empty
            <div class="alert alert-danger">
                خبری وجد ندارد
            </div>
        @endforelse
            
        </div>
    </div>
</section>
<!-- End category Area -->

<!-- Start travel Area -->
<section class="travel-area section-gap" id="travel" dir="rtl">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">پربازدیدترین خبر ها</h1>
                    <p>طراحان سایت هنگام طراحی قالب سایت معمولا با این موضوع رو برو هستند که محتوای اصلی صفحات آماده
                        نیست. در نتیجه طرح کلی دید درستی به کار فرما نمیدهد. اگر طراح بخواهد دنبال متن های مرتبط بگردد
                        تمرکزش از روی کار اصلی برداشته میشود و اینکار زمان بر خواهد بود. </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($mostView as $view)
            <div class="col-mg-6">
              <div class="single-travel media pb-70">
                <img class="img-fluid d-flex mr-3" src="{{$item->image}}" width="220" alt="">
                <div class="dates">
                    <span>
                        {{ \Morilog\Jalali\Jalalian::forge($item->created_at)->format(' %d %B ') }}
                    </span>
                </div>
                <div class="media-body align-self-center">
                    <h4 class="mt-0"><a href="{{route("single",$view->slug)}}">
                        {{$view->title}}</a></h4>
                    <p>
                        {{$view->description}}
                    </p>
                </div>
            </div>
              @endforeach

            <a href="#" class="primary-btn load-more pbtn-2 text-uppercase mx-auto mt-60">مطالب بیشتر </a>
        </div>
    </div>
</section>
<!-- End travel Area -->

<!-- Start fashion Area -->
<section class="fashion-area section-gap" id="fashion" dir="rtl">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">خبرهای ورزشی هفنه</h1>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی
                        مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            @foreach ($sports as $sport)
                
            <div class="col-lg-3 col-md-6 single-fashion">
                <img class="img-fluid" src="/{{$sport->image}}" alt="">
                <p class="date">

                    {{ \Morilog\Jalali\Jalalian::forge($sport->created_at)->format('%B %d، %Y')}}
                </p>
                <h4><a href="{{route("single",$sport->slug)}}">
                {{$sport->title}}
                </a>
            </h4>
                <p>
                    
                </p>
            
            </div>

            @endforeach

            
        </div>
    </div>
</section>
<!-- End fashion Area -->


<!-- start footer Area -->
<footer class="footer-area section-gap" dir="rtl">
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
                        <li><img src="theme/img/i1.jpg" alt=""></li>
                        <li><img src="theme/img/i2.jpg" alt=""></li>
                        <li><img src="theme/img/i3.jpg" alt=""></li>
                        <li><img src="theme/img/i4.jpg" alt=""></li>
                        <li><img src="theme/img/i5.jpg" alt=""></li>
                        <li><img src="theme/img/i6.jpg" alt=""></li>
                        <li><img src="theme/img/i7.jpg" alt=""></li>
                        <li><img src="theme/img/i8.jpg" alt=""></li>
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

<script src="theme/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="theme/js/vendor/bootstrap.min.js"></script>
<script src="theme/js/jquery.ajaxchimp.min.js"></script>
<script src="theme/js/parallax.min.js"></script>
<script src="theme/js/owl.carousel.min.js"></script>
<script src="theme/js/jquery.magnific-popup.min.js"></script>
<script src="theme/js/jquery.sticky.js"></script>
<script src="theme/js/main.js"></script>
</body>
</html>