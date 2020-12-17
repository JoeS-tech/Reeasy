<?php


Route::get('/', function () {
    return view('welcome');
});


// Auth::routes();


// Route pour afficher la vue contenant les données + notes etc.
Route::get('/home', 'HomeController@index')->name('home');

// Route pour récupérer les valeurs de Dump par l'url.
Route::get('/getdump', 'DataController@get_Dump')->name('get.dump');

// Route pour stocker les valeurs dans la BDD
Route::post('/storedump', 'DataController@store_Dump')->name('store.dump');

// Route pour ouvrir et lire el contenu du fichier -----> attendre si on utilise le fetch ou mettre le fopen + file_get
// dans la même fonction

Route::get('/getpollution', 'DataController@get_Pollution')->name('get.pollution');

// Route pour récupérer les valeurs de Antenne par l'url.
Route::get('/getantenne/{rayon}', 'DataController@get_Antenne');

// // Route pour récupérer les valeurs de Antenne300 par l'url.
// Route::get('/getantenne300', 'DataController@get_Antenne300')->name('get.antenne300');

// // Route pour récupérer les valeurs de Antenne500 par l'url.
// Route::get('/getantenne500', 'DataController@get_Antenne500')->name('get.antenne500');

// // Route pour récupérer les valeurs de Antenne750 par l'url.
// Route::get('/getantenne750', 'DataController@get_Antenne750')->name('get.antenne750');

// // Route pour récupérer les valeurs de Antenne1000 par l'url.
// Route::get('/getantenne1000', 'DataController@get_Antenne1000')->name('get.antenne1000');

// Route pour récupérer les valeurs de calc_Antenne par l'url.
Route::get('/calcantenne/{rayon}', 'DataController@calc_Antenne')->name('calc.antenne');
