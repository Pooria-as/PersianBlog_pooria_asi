<div class="col-xl-10 col-lg-9 col-md-8 mr-auto bg-dark fixed-top py-2 top-navbar">
    <div class="row align-items-center">
      <div class="col-md-3 text-right mb-0">
        <h4 class="text-light">داشبورد</h4>
      </div>
      <div class="col-md-6">
        <form>
          <div class="input-group">
            <input type="text" class="form-control search-input" placeholder="جستجو....">
            <button type="button" class="btn btn-light search-button">
              <i class="fas fa-search text-danger"></i>
            </button>
          </div>
        </form>
      </div>
      <div class="col-md-3">
        <ul class="navbar-nav">
          <li class="nav-item icon-parent">
            <a href="#" class="nav-link">
              <i class="fas fa-comment text-muted fa-lg"></i>
            </a>
          </li>
          <li class="nav-item icon-parent">
            <a href="#" class="nav-link">
              <i class="fas fa-bell text-muted fa-lg "></i>
            </a>
          </li>
          <li class="nav-item">
            <form action="{{route("logout")}}" method="POST">
              @csrf
            <button class="btn btn-danger" type="submit">خروج</button>

            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>