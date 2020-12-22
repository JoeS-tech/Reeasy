<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Note Déchets</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
.border{
    width: 400px;
    border: 2px solid grey;
    background-color: lightblue;
    color: coral;
}
.center{
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto
}
.rouge{
    color: red;
}
.bleu{
    color: blue;
    font-size: 30px;
    font-weight: bold;
}

html, body {

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
                color: green;
                /* width: 50px; */
            }

            .links > a {
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md{
                margin-top: 200px;
            }

            .btn{
                font-size: large;
                color: grey;
            }

            @media (max-width: 768px) {
                h1 {
                    font-size: 30px;
                }
                h3 {
                    font-size: 20px;
                }
                body {
                    padding-top: 8rem;
                    padding-bottom: 8rem;
                }

                }
            }
 </style>
<body>
    <div id="app">
        <div class="flex-center position-ref full-height">
            <div class="content">

                <div class="title m-b-md">
                    <img src="logo.png"/> <br>
                    {{-- Green Note <br> --}}

                    <img src="Note3.png" />
                </div>

                <div class="links btn ">
                    <p class="bleu">  Voici votre Green note :  @yield('notefinale')</p>
                    <p class="rouge">  <img src="Picto2.png"> Réseau propre : @yield('noteantenne')</p>
                    <p class="rouge">  <img src="Picto2.png">Collecte des déchets : @yield('notedump')</p>
                    <p class="rouge">  <img src="Picto3.png"> Propreté de l'air : @yield('notepollution')</p>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
