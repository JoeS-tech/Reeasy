<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');


//************-----1--------***********page de garde + page Green Note***********------1--------**************

// Page de garde
Route::get('/affichage', 'DataController@affichage')->name('affichage');

// Green Note
Route::get('/parametres', 'DataController@parametre')->name('parametre');

//************-----2--------***********Antenne***********------2--------**************

// Note paramètre Réseau Propre
Route::get('/getallantenne', 'DataController@All_Antenne')->name('get.all.antenne');


//************-----3--------***********Pollution***********------3--------**************
Route::get('/pollution', 'TestController@get_Pollution');
