
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
        <div class="row justify-content-between align-items-center d-flex">
            <div class="col-lg-8 top-left">
                <h1 class="text-white mb-20">توضیح کامل خبر</h1>
                <ul>
                    <li><a href="/">صفحه اصلی</a><span class="lnr lnr-arrow-right"></span></li>
                    <li><a href="">{{$post->category->name}}</a><span class="lnr lnr-arrow-right"></span></li>
                    <li><a href="">
                        {{$post->title}}</a></li>
                </ul>
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
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="single-page-post">
                        <img class="img-fluid" src="/{{$post->image}}" alt="">
                        <div class="top-wrapper ">
                            <div class="row d-flex justify-content-between">
                                <h2 class="col-lg-8 col-md-12 text-uppercase">
                                    {{$post->title}}
                                </h2>
                                <div class="col-lg-4 col-md-12 right-side d-flex justify-content-end">
                                    <div class="desc">
                                        <h2>نویسنده : {{$post->user->name}} </h2>
                                        <h3>تاریخ :
                                            {{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %d، %Y')}}
                                        </h3>
                                    </div>
                                    <div class="user-img">
                                        <img src="{{ Gravatar::src($post->user->name) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tags">
                            <ul>
                                @foreach ($tags as $tag)
                                    
                                @endforeach
                                <li><a href="#">    
                                {{$tag->name}}    
                                </a></li>
                                
                            </ul>
                        </div>
                        <div class="single-post-content">
                           

                            <blockquote>
                                {{$post->description}}
                             </blockquote>

                            <p>
                              {!!$post->content!!}
                            </p>
                           
                        </div>
                        <div class="bottom-wrapper">
                            <div class="row">
                                <div class="col-lg-4 single-b-wrap col-md-12">
                                    <form action="{{route("like",$post->slug)}}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button class="btn btn-outline-success" type="submit">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
        
                                          </button>
                                    </form>

                                    تعداد لایک ها :{{$post->like}}
                                    <br>

                                    <form action="{{route("dislike",$post->slug)}}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button class="btn btn-outline-danger" type="submit">
                                            <i class="fa fa-thumbs-down"></i>
                                          </button>
                                    </form>

                                    <br>
                                    تعداد نپسندیده ها :{{$post->Disslike}}

                                </div>
                                <div class="col-lg-4 single-b-wrap col-md-12">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i> 
                                {{$post->comments()->count()}} نظر
                                </div>
                                <div class="col-lg-4 single-b-wrap col-md-12">
                                    <ul class="social-icons">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <!-- Start comment-sec Area -->
                        <section class="comment-sec-area pt-80 pb-80">
                            <div class="container">
                                <div class="row flex-column">
                                    <h5 class="text-uppercase pb-80">@php
                                        echo DB::table('comments')->where("status","Enable")->where("post_id",$post->id)->count(); 
                                    @endphp
                                    نظر</h5>
                                    <br>
                                    @php
                                    $comments=DB::table('comments')->where("status","Enable")->where("post_id",$post->id)->get();
                                    @endphp
                                   @foreach ($comments as $item)
                                   <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                           
                                            <div class="desc">
                                                <h5><a href="#">
                                                {{$item->name}}    
                                                </a></h5>
                                                <p class="date">

                                                    {{\Morilog\Jalali\Jalalian::forge($item->created_at)->format(' %d %B ')}}
                                                </p>
                                                <p class="comment">
                                                 {{$item->content}}
                                                </p>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                                   @endforeach
                                 
                                </div>
                            </div>
                        </section>
                        <!-- End comment-sec Area -->

                        <!-- Start commentform Area -->
                        <section class="commentform-area  pb-120 pt-80 mb-100">
                            <div class="container">
                                <h5 class="text-uppercas pb-50">ثبت نظر</h5>
                                @include("inc.success") 

                                <div class="row flex-row d-flex">
                                    <div class="col-lg-6">
                                <form action="{{route("createComment",$post->slug)}}" method="POST">
                                    @csrf
                                        <input name="name" placeholder="نام خود را وارد کنید" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'نام خود را وارد کنید'"
                                               class="common-input mb-20 form-control" required="" type="text" name="name">
                                        <input name="email" placeholder="ایمیل خود را وارد کنید"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'ایمیل خود را وارد کنید'"
                                               class="common-input mb-20 form-control" required="" type="email" name="email">

                                        <input  placeholder="موضوع نظر" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'موضوع نظر'"
                                               class="common-input mb-20 form-control" required="" type="text" name="title">

                                    </div>
                                    <div class="col-lg-6">
                                        <textarea class="form-control mb-10"  placeholder="متن نظر"
                                                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'متن نظر'"
                                                  required="" name="content"></textarea>
                                            <button class="primary-btn mt-20" type="submit">
                                                ارسال نظر
                                            </button>
                                            </form>
                                    </div>
                                
                                </div>
                            </div>
                        </section>
                        <!-- End commentform Area -->

                    </div>
                </div>
                <div class="col-lg-4 sidebar-area">
                    {{-- <div class="single_widget search_widget">
                        <div id="imaginary_container">
                            <div class="input-group stylish-input-group">
                                <input type="text" class="form-control" placeholder="جستجو...">
                                <span class="input-group-addon">
                                        <button type="submit">
                                            <span class="lnr lnr-magnifier"></span>
                                        </button>
                                    </span>
                            </div>
                        </div>
                    </div> --}}

                 @include("theme.partialviews.sidebarTheme")
                </div>
            </div>
        </div>
    </section>
    <!-- End post Area -->
</div>
<!-- End post Area -->

<!-- start footer Area -->
<footer class="footer-area section-gap">
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