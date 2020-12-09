<?php


Route::get('/', function () {
    return view('...');
});

Auth::routes();


// Route pour afficher la vue contenant les données + notes etc.
Route::get('/home', 'DataController@home')->name('home');

// Route pour récupérer les valeurs de Dump par l'url.
Route::get('/com', 'DataController@get_Dump')->name('get.dump');

// Route pour stocker les valeurs dans la BDD
Route::post('/com', 'DataController@store_Dump')->name('store.dump');

// Route pour ouvrir et lire el contenu du fichier -----> attendre si on utilise le fetch ou mettre le fopen + file_get
// dans la même fonction

Route::get('/com', 'DataController@get_Pollution')->name('get.pollution');
