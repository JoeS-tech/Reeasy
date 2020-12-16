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
        // dd($php_dump->results[15]->TONNAGE_OMA_T);
        $ton = $php_dump->results[15]->TONNAGE_OMA_T;
        $hab = $php_dump->results[15]->POPULATION;
        $moy_dump = ($ton / $hab) * 1000;
        dd($ton, 'test', $ton, $hab, $moy_dump);
        return $ton;
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


    public function get_Antenne($RAYON)
    {
        $test = "test affichage";
        // dd ($test);
        $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C' . $RAYON;
        $antenne = file_get_contents($url_antenne);
        $json_antenne = json_decode($antenne);
        dd($json_antenne);
        return $json_antenne;
        /* $ton = $php_dump->results[15]->TONNAGE_OMA_T;
        $hab = $php_dump->results[15]->POPULATION;
        $moy_dump = ($ton / $hab) * 1000;
        dd($ton, 'test', $ton, $hab, $moy_dump);
        return $ton;*/
    }
    public function get_antenne300()
    {
        $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C300';
        $antenne = file_get_contents($url_antenne);
        $json_antenne = json_decode($antenne);
        $note = array(0 => 10, 1 => 7, 2 => 6, 3 => 5, 4 => 4, 5 => 3, 6 => 2, 7 => 4, 8 => 3, 9 => 2, 10 => 1);
        //dd($json_antenne);
        return $note[$json_antenne->nhits];
    }
    public function get_antenne500()
    {
        $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C500';
        $antenne = file_get_contents($url_antenne);
        $json_antenne = json_decode($antenne);
        $note = array(0 => 10, 1 => 7, 2 => 6, 3 => 5, 4 => 4, 5 => 3, 6 => 2, 7 => 4, 8 => 3, 9 => 2, 10 => 1);
        //dd($json_antenne);
        return $note[$json_antenne->nhits];
    }
    public function get_antenne750()
    {
        $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C750';
        $antenne = file_get_contents($url_antenne);
        $json_antenne = json_decode($antenne);
        $note = array(0 => 10, 1 => 7, 2 => 6, 3 => 5, 4 => 4, 5 => 3, 6 => 2, 7 => 4, 8 => 3, 9 => 2, 10 => 1);
        //dd($json_antenne);
        return $note[$json_antenne->nhits];
    }
    public function get_antenne1000()
    {
        $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C1000';
        $antenne = file_get_contents($url_antenne);
        $json_antenne = json_decode($antenne);
        $note = array(0 => 10, 1 => 7, 2 => 6, 3 => 5, 4 => 4, 5 => 3, 6 => 2, 7 => 4, 8 => 3, 9 => 2, 10 => 1);
        //dd($json_antenne);
        return $note[$json_antenne->nhits];
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
