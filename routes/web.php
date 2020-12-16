<?php


Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();


// Route pour afficher la vue contenant les données + notes etc.
Route::get('/home', 'DataController@index')->name('home');

// Route pour récupérer les valeurs de Dump par l'url.
Route::get('/getdump', 'DataController@get_Dump')->name('get.dump');

// Route pour afficher la note dump .
Route::get('/notedump', 'DataController@noteDump');

// Route pour afficher la note dump .
Route::get('/thcalcul', 'DataController@th_Calculate');

// Route pour afficher la note finale nd de dump .
Route::get('/nddump', 'DataController@note_Finale_Dump')->name('nd.dump');

// Route pour afficher la note finale TOTALE de dump .
Route::get('/notefin', 'DataController@notefinaledump')->name('nf.dump');

// Route pour afficher le lien pour la  note finale TOTALE de dump dans une autre vue (index).
Route::get('/affichage', 'DataController@affichage')->name('affichage');

// Route pour récupérer les valeurs de Antenne par l'url.
Route::get('/getantenne', 'DataController@get_Antenne')->name('get.antenne');

// Routes pour le paramètre transport********************-----------*****************-----------*************

// Route pour tester l'affichage de la data de l'url json Transport
Route::get('/gettrans', 'ParametreController@aff_Json')->name('get.trans');



