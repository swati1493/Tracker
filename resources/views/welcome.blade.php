<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BOD</title>

        <!-- Fonts -->
       <!--  <link href="https://fonts.googleapis.com/css?family=Roboto:100,600" rel="stylesheet" type="text/css"> -->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Roboto';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body style="background-color: pink;">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                   <!--  <a href="{{ url('/register') }}">Register</a> -->
                </div>
            @endif

            <div class="content">
                <a href="https://www.brandsofdesire.com/"><img src="https://www.brandsofdesire.com/wp-content/uploads/2018/03/BoD-logo-2.png" style="padding-top: 50px" class="img-responsive" width=20%></a>
                <div class="title m-b-md"> 
                  <strong style="font-size:7vw;">BRANDS OF DESIRE<br>TRACKER</strong>
                </div>

                <div class="links">
                    <a href="https://www.brandsofdesire.com/about/">About</a>
                    <a href="https://www.brandsofdesire.com/services/">Services</a>
                    <a href="https://www.brandsofdesire.com/work/">Work</a>
                    <a href="https://www.brandsofdesire.com/work/m">Clients</a>
                    <a href="https://www.brandsofdesire.com/careers/">Careers</a>
                     <a href="https://www.brandsofdesire.com/contact/">Contact</a>
                    <!-- <a href="{{ url('/register') }}">Register</a> -->
                </div>
            </div>
        </div>
    </body>
</html>
