<header class="default-header" dir="rtl">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="theme/img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    @foreach ($categories as $category)
                    <li>
                        <a href="#">
                    {{$category->name}}    
                    </a></li>
                        
                    @endforeach
                    
                  
                </ul>
            </div>
        </div>
    </nav>
</header>