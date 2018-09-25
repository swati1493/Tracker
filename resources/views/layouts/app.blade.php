<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BOD') }}</title>

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    


    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Brands Of Desire</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('fonts/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
</head>
<!-- <body style=" background-image:url(../bg.jpg)"> -->
    <body>




    <div class="header">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="background-color: #212121;margin-bottom: 0px;">
            <div class="container-fluid">
                <div class="navbar-header">

                   
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a ><img style="padding-top: 15px;" width="50%" src="{{asset('http://bodservers.com/assets/img/bod-logo-white-2.png')}}"></a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                           <!--  <li><a href="{{ url('/login') }}" style="color: #ffffff;font-size: 16px;font-weight: bolder;">Login</a></li> -->
                            <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true" style="font-weight: bold;color: #ffffff;font-size: 20px;background-color: #212121;" >
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                     <a href="#" onclick="document.getElementById('logout-form').submit();"
">
                                            Logout
                                        </a>
                                        
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
        
    </div>
<!-- <div id="footer">
    <div class="container">
        <p class="text-muted credit"><span style="text-align: left; float: left">&copy; 2015 <a href="#">Laravel
                    5 Starter Site</a></span> <span class="hidden-phone"
                                                    style="text-align: right; float: right">Powered by: <a
                        href="http://laravel.com/" alt="Laravel 5.1">Laravel 5.1</a></span></p>
    </div>
</div> -->
 
<!-- <footer class="navbar navbar-default navbar-fixed-bottom">
    <div class="container-fluid" style="padding-top: 8px;">
    
    <div class="pull-right hidden-xs">

        <a href="https://en.wikipedia.org/wiki/Brands_of_Desire" target="_blank"><img src="../../laravel-project/wikipedia-logo.png" width="" border="0" alt="Wikipedia"/></a>
<a href="https://www.facebook.com/brandsofdesire/" target="_blank"><img src="../../laravel-project/facebook-logo-button.png" border="0" alt="Twitter"/></a>
<a href="https://in.linkedin.com/company/brands-of-desire" target="_blank"><img src="../../laravel-project/linkedin-button.png" border="0" alt="Google+"/></a>
<a href="https://vimeo.com/brandsofdesire" target="_blank"><img src="../../laravel-project/social-vimeo-in-a-circle-logo.png" border="0" alt="Addthis"/></a>
         
    </div>

   
    <a style="text-decoration: none;" href="https://www.brandsofdesire.com/" target="_blank"> <strong>www.brandsofdesire.com</strong></a>
    <strong style="padding-left: 350px;font-size: 20px;">passionate about branding</strong>
</div>
</footer>
 -->    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript">
        $('#logout-form').click(function(){
                alert();
        });
    </script>
</div>



 

</body>
</html>
