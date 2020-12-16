<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    //-----------Début code ---------------

    public function aff_Json()
    {
        $arrets = file_get_contents('https://www.data.gouv.fr/fr/datasets/r/ba635ef6-b506-4381-9dc9-b51ad3c482ab');
        $test_decode = json_decode($arrets);
        $test = $test_decode->features[2];
        dd($test);
    }


    $long=longitude;
    $lat=latitude;

    






    //  file_get_contents— Lit tout un fichier dans une chaîne
    // public function get_Pollution()
    // {
    //     $pollution = file_get_contents('https://trouver.datasud.fr/dataset/c9b4ec5b-fa45-4d71-b72a-9a067564b3fe/resource/787a02c2-0ae6-
    //     43d9-ab08-aecc6a56435e/download/mes_sudpaca_annuelle.csv');


    // str_getcsv($pollution);
    // json_decode($pollution);
    // dd($pollution);

    //}
    // 1-fonction de la doc pour extraire les données d'un tableau et les afficher dans un tableau
    // function read($csv)
    // {

    //     $file = fopen($csv, 'r');
    //     while (!feof($file)) {
    //         $line[] = fgetcsv($file, 1024);
    //     }
    //     fclose($file);
    //     return $line;
    // }

    /* Json_decode pour convertir les résultats de l'url en PHP*/

    // $json = $line;
    // var_dump(json_decode($json));
    // var_dump(json_decode($json, true));

    // 2-Définir le chemin d'accès au fichier CSV
    // $url_csv = 'https://koumoul.com/s/data-fair/api/v1/datasets/performances-collecte-oma-par-type-dechet-par-dept/lines?format=json06&q=06&q_mode=simple';
    // $csv = '$url_csv';
    // $csv = read($csv);
    // echo '<pre>';
    // print_r($csv);
    // echo '</pre>';

    // -----------------Fin code

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
