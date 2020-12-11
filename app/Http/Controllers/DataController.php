<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dumtable;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*Function to get the API response / Dump */
    public function get_Dump()
    {
        $test = "test affichage";
        // dd ($test);
        $url_dump = 'https://koumoul.com/s/data-fair/api/v1/datasets/performances-collecte-oma-par-type-dechet-par-dept/lines?format=json06&q=06&q_mode=simple';
        $dump = file_get_contents($url_dump);
        $php_dump = json_decode($dump);
        // $verre=$php_dump['TONNAGE_OMA_T']; // ?
        // $papier=$php_dump['TONNAGE_OMA_T']; // ?
        // $menage=$php_dump['TONNAGE_OMA_T']; // ?
        // $thv=$php_dump['RATIO_OMA'];
        // $thp=$php_dump['RATIO_OMA'];
        // $thm=$php_dump['RATIO_OMA'];
        // var_dump($dump);
        dd($php_dump->results[15]->TONNAGE_OMA_T);
        results[15]->TONNAGE_OMA_T

        $year = 2017; /*Comment retourner la valeur des déchets pour une année spécifique? - Tableau multidimentionnel*/

        if ($php_dump['Annee'] == $year) {
            return $verre;
            $papier;
            $menage;
            $thv;
            $thp;
            $thm;
        }
    }

    public function dumpcalculate($verre, $papier, $menage, $thv, $thp, $thm) // Fonction sera bouclée par groupe <C-2>
    {
        $dump = $verre + $papier + $menage;
        $recyclable = $verre + $papier;
        $tr = ($recyclable / $dump) * 10;
        $th = $thv + $thp + $thm;
        $nd = 0.7 * $tr + 0.3 * $th;
        dd($dump);
        return $nd;
    }

    // Arrondir les tonnages

    function roundToDown($t)
    {
        return round($t / 10, 0, PHP_ROUND_HALF_DOWN) * 10;
    }

    function roundToUp($t)
    {
        return round($t / 10, 0, PHP_ROUND_HALF_UP) * 10;
    }

    /*Function to store the recovered Dump value in the DB Table Dum*/

    // public function store_Dump(Request $request)
    // {
    // $dum = new Dumtable();
    // $dum->dumQty = $request->$dump;
    // $dum->save();
    // }

    //  file_get_contents— Lit tout un fichier dans une chaîne
    public function get_Pollution()
    {
        $pollution = file_get_contents('https://trouver.datasud.fr/dataset/c9b4ec5b-fa45-4d71-b72a-9a067564b3fe/resource/787a02c2-0ae6-
        43d9-ab08-aecc6a56435e/download/mes_sudpaca_annuelle.csv');


        // str_getcsv($pollution);
        // json_decode($pollution);
        // dd($pollution);

    }
    // 1-fonction de la doc pour extraire les données d'un tableau et les afficher dans un tableau
    function read($csv)
    {

        $file = fopen($csv, 'r');
        while (!feof($file)) {
            $line[] = fgetcsv($file, 1024);
        }
        fclose($file);
        return $line;
    }

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
}
