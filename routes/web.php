<?php


Route::get('/', function () {
    return view('welcome');
});


// Auth::routes();


// Route pour afficher la vue contenant les données + notes etc.
Route::get('/home', 'HomeController@index')->name('home');

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
// // Route pour récupérer les valeurs de Antenne par l'url.
// Route::get('/getantenne', 'DataController@get_Antenne')->name('get.antenne');

// Routes pour le paramètre transport********************-----------*****************-----------*************

// Route pour tester l'affichage de la data de l'url json Transport
Route::get('/gettrans', 'ParametreController@aff_Json')->name('get.trans');

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

// Route pour récupérer les valeurs de calc_Antenne par l'url.
Route::get('/calcantenne/{rayon}', 'DataController@calc_Antenne')->name('calc.antenne');

// Route pour récupérer les valeurs de Antenne1000 par l'url.
Route::get('/getantenne1000', 'DataController@get_Antenne1000')->name('get.antenne1000');

//--------------abdel pollution

// Route pour pollution.
Route::get('/pollution', 'TestController@get_Pollution');
// Route pour récupérer les valeurs de All_Antenne par l'url.
Route::get('/getallantenne', 'DataController@All_Antenne')->name('get.all.antenne');
