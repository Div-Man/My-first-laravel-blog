<!doctype html>
<html lang="en">
  <head>
    <title>Colorlib Balita &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700" rel="stylesheet">

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">

    <link rel="stylesheet" href="/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="/css/style.css">
    
    <style>
        .myPag a, .myPag .active, .header-user-info li {
            display: inline-block;
            vertical-align: top;
            margin-right: 5px;
        }
        
        .header-user-info li {
             margin-right: 15px;
        }
        
    </style>
  </head>
  <body>

  <header role="banner">
      <div class="container logo-wrap">
        <div class="row pt-5">
          <div class="col-12 text-center">
            <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
            <h1 class="site-logo"><a href="/">Balita</a></h1>
          </div>
        </div>
      </div>
      
      <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <div class="container">
          
         
          <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto header-user-info">
                  
                @if(Auth::check())
                    <li> {{ Auth::user()->name}}</li>
                    <li><a href="/profile">Мой профиль</a></li>
                    <li><a href="/logout">Выход</a></li>
                @else
                    <li><a href="/register">Регистрация</a></li>
                    <li><a href="/login">Войти</a></li>
                 @endif      
 
            </ul>
            
          </div>
        </div
      </nav>
    </header>
  

	@yield('content')

<!--footer start-->



<!-- js files -->
<script src="/js/front.js"></script>
<script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/jquery-migrate-3.0.0.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.waypoints.min.js"></script>
    <script src="/js/jquery.stellar.min.js"></script>

    
    <script src="/js/main.js"></script>
</body>
</html>