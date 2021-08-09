<div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
    <a href="#" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">ایده های
      ناب</a>
    <div class="d-flex justify-content-center align-self-center bottom-border pb-2">

      <img src="{{ Gravatar::src(auth()->user()->email) }}" alt="" width="40px" height="30px" class="rounded-circle ml-2">
      <a href="{{route("User.create")}}" class="text-white">
        {{Auth::user()->name}}
      </a>
      
    </div>
    <ul class="navbar-nav flex-column text-right mt-2">
      <li class="nav-item pl-3">
        <a href="#" class="nav-link text-white p-2 mb-2 current"><i
            class="fas fa-home text-light fa-lg ml-3"></i>داشبورد</a>
      </li>




      <li class="nav-item pl-3">
        <a href="{{route("User.create")}}" class="nav-link text-white p-2 mb-2 sidebar-link"><i
            class="fas fa-user text-light fa-lg ml-3"></i>پروفایل</a>
      </li>

    

      <li class="nav-item pl-3">
        <a href="{{route("Category.index")}}" class="nav-link text-white p-2 mb-2 sidebar-link"><i
            class="fas fa-folder text-light fa-lg ml-3"></i>دسته بندی</a>
      </li>
      <li class="nav-item pl-3">
        <a href="{{route("Post.index")}}" class="nav-link text-white p-2 mb-2 sidebar-link"><i
            class="fas fa-file text-light fa-lg ml-3"></i>پست ها</a>
      </li>
      <li class="nav-item pl-3">
        <a href="{{route("Tag.index")}}" class="nav-link text-white p-2 mb-2 sidebar-link"><i
            class="fas fa-tag text-light fa-lg ml-3"></i>تگ </a>
      </li>

      <li class="nav-item pl-3">
        <a href="{{route("User.index")}}" class="nav-link text-white p-2 mb-2 sidebar-link"><i
            class="fas fa-users text-light fa-lg ml-3"></i>کاربران </a>
      </li>

      <li class="nav-item pl-3">
        <a href="{{route("Comment.index")}}" class="nav-link text-white p-2 mb-2 sidebar-link"><i
            class="fas fa-comment text-light fa-lg ml-3"></i>نظرات </a>
      </li>

    
    </ul>
  </div>