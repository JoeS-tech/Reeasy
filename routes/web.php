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


