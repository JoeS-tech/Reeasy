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
.affichage {
    background-color: aquamarine;
}

html, body {
                background-image: url('storage/assets/uploads/GreenNote-accueil.png');
                background-position: top;
                background-repeat: no-repeat;
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

</style>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Reeasy
            </div>

            <div class="links btn">
                <button type="button" class="btn"><a class="btn" href="@route('parametre')" target="_blank"> Obtenir les notes des paramètres</a></button>
            </div>
        </div>
    </div>
</body>
</html>
