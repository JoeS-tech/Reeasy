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


    public function get_Dump()
    {
        $url_dump = 'https://koumoul.com/s/data-fair/api/v1/datasets/performances-collecte-oma-par-type-dechet-par-dept/lines?format=json06&q=06&q_mode=simple';
        $dump = file_get_contents($url_dump);
        $php_dump = json_decode($dump);
        $verre = $php_dump->results[15]->TONNAGE_OMA_T;
        $emballage = $php_dump->results[14]->TONNAGE_OMA_T;
        $menageres = $php_dump->results[13]->TONNAGE_OMA_T;
        $hab = $php_dump->results[15]->POPULATION;
        $total_dechets = $verre + $emballage + $menageres;
        $recyclable = $verre + $emballage;

        // echo " (Je suis un Echo de la get_Dump) Le Tonnage recycleble est $recyclable";

        $tr = ($recyclable / $total_dechets) * 10;

        // echo " TR est $tr";

        return ["tr" => $tr, "total" => $total_dechets, "hab" => $hab];
    }

    /*Calcul de la note TH pour le paramètre Dump*/

    public function th_Calculate($a, $b)
    {
        $notes = [10 => 520, 9 => 530, 8 => 540, 7 => 550, 6 => 560, 5 => 570, 4 => 580, 3 => 590, 2 => 600, 1 => 610];

        $dumpNote = 0;

        // $dump_hab=540;

        $dump_hab = $a / $b;
        // dd($notes);
        foreach ($notes as $key => $value) {
            if ($dump_hab <= $value && $key > $dumpNote) {
                $dumpNote = $key;
            }
            // dd($value);
        }
        //    dd($dumpNote);
        return $dumpNote;
    }

    public function noteDump()
    {
        $c = $this->get_Dump();
        $test = $this->th_Calculate($c["total"], $c["hab"]);
        return view('index', ['th' => $test]);
        //   dd($test);
    }

    public function note_Finale_Dump()
    {
        $tr_dump = $this->get_Dump();
        //dd($tr_dump["tr"]);
        $test = $tr_dump["tr"];
        // dd($test);
        $th_dump = $this->th_Calculate($tr_dump["total"], $tr_dump["hab"]);
        // dd($th_dump);

        $nd = 0.7 * $test + 0.3 * $th_dump;
        // dd($nd);
        return view('index', ['notedechets' => $nd]);
    }

    public function affichage()
    {
        return view('layouts/aff');
    }


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
    // public function get_Pollution()
    // {
    //     $pollution = file_get_contents('https://trouver.datasud.fr/dataset/c9b4ec5b-fa45-4d71-b72a-9a067564b3fe/resource/787a02c2-0ae6-
    //     43d9-ab08-aecc6a56435e/download/mes_sudpaca_annuelle.csv');


    // str_getcsv($pollution);
    // json_decode($pollution);
    // dd($pollution);

    //}
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


<<<<<<< HEAD
    // public function get_Antenne()
    // {
    //     $test = "test affichage";
    //     // dd ($test);
    //     $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=LATITUDE%2CLONGITUDE%2CRAYON';
    //     $antenne = file_get_contents($url_antenne);
    //     $php_antenne = json_decode($antenne);
    //     dd($php_antenne);
    // }
=======
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
    public function calc_Antenne($RAYON)
    {
        if ($RAYON < 0 || $RAYON <= 300) {
            $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C' . $RAYON;
            $antenne = file_get_contents($url_antenne);
            $json_antenne = json_decode($antenne);
            $note = array(0 => 10, 1 => 7, 2 => 6, 3 => 5, 4 => 4, 5 => 3, 6 => 2, 7 => 1, 8 => 0, 9 => 0, 10 => 0);
            //dd($json_antenne);
            return $note[$json_antenne->nhits];
        } elseif ($RAYON < 300 || $RAYON <= 500) {
            $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C' . $RAYON;
            $antenne = file_get_contents($url_antenne);
            $json_antenne = json_decode($antenne);
            $RAYON = $note = array(0 => 10, 1 => 8, 2 => 7, 3 => 6, 4 => 5, 5 => 4, 6 => 3, 7 => 2, 8 => 1, 9 => 0, 10 => 0);
            //dd($json_antenne);
            return $note[$json_antenne->nhits];
        } elseif ($RAYON < 500 || $RAYON <= 750) {
            $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C' . $RAYON;
            $antenne = file_get_contents($url_antenne);
            $json_antenne = json_decode($antenne);
            $RAYON = $note = array(0 => 10, 1 => 9, 2 => 8, 3 => 7, 4 => 6, 5 => 5, 6 => 4, 7 => 3, 8 => 2, 9 => 1, 10 => 0);
            //dd($json_antenne);
            return $note[$json_antenne->nhits];
        } elseif ($RAYON <  0 || $RAYON <= 1000) {
            $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C' . $RAYON;
            $antenne = file_get_contents($url_antenne);
            $json_antenne = json_decode($antenne);
            $RAYON = $note = array(0 => 10, 1 => 10, 2 => 9, 3 => 8, 4 => 7, 5 => 6, 6 => 5, 7 => 4, 8 => 3, 9 => 2, 10 => 1);
            //dd($json_antenne);
            return $note[$json_antenne->nhits];
        }
    }
<<<<<<< HEAD

    // public function get_antenne300()
    // {
    //     $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C300';
    //         $antenne = file_get_contents($url_antenne);
    //         $json_antenne = json_decode($antenne);
    //         $RAYON = $note = array(0 => 10, 1 => 7, 2 => 6, 3 => 5, 4 => 4, 5 => 3, 6 => 2, 7 => 1, 8 => 0, 9 => 0, 10 => 0);
    //         //dd($json_antenne);
    //         return $note[$json_antenne->nhits];
    // }
    // public function get_antenne500()
    // {
    //     $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C500';
    //     $antenne = file_get_contents($url_antenne);
    //     $json_antenne = json_decode($antenne);
    //     $note = array(0 => 10, 1 => 8, 2 => 7, 3 => 6, 4 => 5, 5 => 4, 6 => 3, 7 => 2, 8 => 1, 9 => 0, 10 => 0);
    //     //dd($json_antenne);
    //     return $note[$json_antenne->nhits];
    // }
    // public function get_antenne750()
    // {
    //     $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C750';
    //     $antenne = file_get_contents($url_antenne);
    //     $json_antenne = json_decode($antenne);
    //     $note = array(0 => 10, 1 => 9, 2 => 8, 3 => 7, 4 => 6, 5 => 5, 6 => 4, 7 => 3, 8 => 2, 9 => 1, 10 => 0);
    //     //dd($json_antenne);
    //     return $note[$json_antenne->nhits];
    // }
    // public function get_antenne1000()
    // {
    //     $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C1000';
    //     $antenne = file_get_contents($url_antenne);
    //     $json_antenne = json_decode($antenne);
    //     $note = array(0 => 10, 1 => 10, 2 => 9, 3 => 8, 4 => 7, 5 => 6, 6 => 5, 7 => 4, 8 => 3, 9 => 2, 10 => 1);
    //     //dd($json_antenne);
    //     return $note[$json_antenne->nhits];
    // }
=======
>>>>>>> 5dd59523fe8bf5753f3cc28b916e022be9cd8013
>>>>>>> f9743110a265b063f60f6a359cbffcb0dbff70db
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

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
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }


    //     /**
    //      * Remove the specified resource from storage.
    //      *
    //      * @param  int  $id
    //      * @return \Illuminate\Http\Response
    //      */
}
