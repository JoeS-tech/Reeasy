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
body {
    
}
 </style>
<body>
    <div id="app">
    <a href="@route('nd.dump')" target="_blank" class="affichage">Note déchets</a>
     </div>
</body>
</html>
