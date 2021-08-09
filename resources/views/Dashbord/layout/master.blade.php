<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
@include("Dashbord.partials.style")
</head>

<body>
  <header>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
      <button class="navbar-toggler mb-2 bg-light" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="container-fluid">
          <div class="row">
            <!-- sidebar -->
           @include("Dashbord.partials.sidebar")
            <!--end of sidbar -->
            <!-- top nav -->
            @include("Dashbord.partials.topNav")
            <!-- end of top nav -->
          </div>
        </div>
      </div>
    </nav>
    <!-- end of navbar -->
  </header>
  <main>

    <!-- card -->
    <div class="row mx-0">
      <div class="col-xl-10 col-lg-9 col-md-8 mr-auto">
        <div class="row pt-md-5 mt-md-3 mb-5 mx-0">
          <!-- sales -->
          <div class="col-xl-3 col-sm-6  p-2">
            <div class="card border-0 card-common">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <i class="fas fa-file fa-3x text-warning float-right"></i>
                  <div class="text-right text-secondary">
                    <h5>پست</h5>

                    @php
                      $postCount=DB::table('posts')->count();
                    @endphp

                    <h3 class="text-md-small">
                  <?=  $postCount ?> عدد

                    </h3>
                  </div>
                </div>
              </div>
              <div class="card-foorter text-right mr-3 text-secondary">
              
              
              </div>
            </div>
          </div>
          <!-- Money -->
          <div class="col-xl-3 col-sm-6 p-2">
            <div class="card border-0 card-common">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <i class="fas fa-folder fa-3x text-success"></i>
                  <div class=" text-right text-secondary">
                    <h5>دسته بندی</h5>
                    @php
                      $CategoryCount=DB::table('categories')->count();
                    @endphp
                    <h3 class="text-md-small">
                      <?= $CategoryCount ?> عدد

                    </h3>
                  </div>
                </div>
              </div>
                {{-- <div class="card-foorter text-right mr-3 text-secondary">
                  <i class="fas fa-sync ml-3"></i>
                  <span>به روز رسانی</span>
                </div> --}}
            </div>
          </div>
          <!-- user -->
          <div class="col-xl-3 col-sm-6 p-2">
            <div class="card border-0 card-common">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <i class="fas fa-user fa-3x text-info"></i>
                  <div class=" text-right text-secondary">
                    <h5>کاربران</h5>
                    @php
                      $UserCount=DB::table('users')->count();
                    @endphp
                    <h3 class="text-md-small">
                      <?=  $UserCount ?> نفر
                    </h3>
                  </div>
                </div>
              </div>
            
            </div>
          </div>
          <!-- chart -->
          <div class="col-xl-3 col-sm-6 p-2">
            <div class="card border-0 card-common">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <i class="fas fa-tag fa-3x text-danger"></i>
                  <div class=" text-right text-secondary">
                    <h5>تگ</h5>
                    @php
                      $postTag=DB::table('tags')->count();
                    @endphp
                    <h3 class="text-md-small">
                      <?= $postTag ?> 
                    </h3>
                  </div>
                </div>
              </div>
            
            </div>
          </div>


        </div>
      </div>
    </div>
    <!-- end of card -->

    <!-- table -->
  
    <!-- end oftable -->
    {{-- <section>
        <div class="container-fluid">
          <div class="row mx-0 mb-5">
            <div class="col-xl-10 col-lg-9 col-md-8 mr-auto">
              <div class="row align-items-center">
                <!-- salary table -->
                <div class="col-xl-6 col-12 mb-4 mb-xl-0">
               @yield('Content')
                </div>
              </div>
            </div>

        </div>
    </section> --}}

    <section>
      <div class="container-fluid">
        <div class="row mx-0 mb-5">
          <div class="col-xl-10 col-lg-9 col-md-8 mr-auto">
            <div class="row align-items-center">
              <!-- salary table -->
             <div class="container">
               <div class="row">
            
                   @yield('Content')
                 
               </div>
             </div>
              <!-- end of salary table -->

        
              <!-- end of payments table -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- footer -->

    <!-- end of footer -->

    @include("Dashbord.partials.script")
</body>

</html>