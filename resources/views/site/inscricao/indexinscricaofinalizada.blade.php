<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inscrição</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
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
    <body>
        <div class="flex-center position-ref full-height" style="">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('admin.home') }}">Home</a>
                        <a href="{{ route('profile') }}">Meu Perfil</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        <!--//@if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrar</a>
                        //@endif-->
                            
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                Inscrições Finalizadas!
                </div>

                <div class="links">
                    <a href="https://www.giraffas.com.br/">Giraffas.com.br</a>
                    <a href="https://www.facebook.com/redegiraffas/">Facebook</a>
                    <a href="https://twitter.com/giraffas_?lang=en">Twitter</a>
                    <a href="https://www.instagram.com/redegiraffas">Instagram</a>
                </div>
            </div>
        </div>
    </body>
</html>
