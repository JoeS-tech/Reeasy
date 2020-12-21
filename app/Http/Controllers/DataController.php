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

        $tr = ($recyclable / $total_dechets) * 10;

        return ["tr" => $tr, "total" => $total_dechets, "hab" => $hab];
    }

    /*Calcul de la note TH pour le paramètre Dump*/

    public function th_Calculate($a, $b)
    {
        $notes = [10 => 520, 9 => 530, 8 => 540, 7 => 550, 6 => 560, 5 => 570, 4 => 580, 3 => 590, 2 => 600, 1 => 610];

        $dumpNote = 0;

        $dump_hab = $a / $b;

        foreach ($notes as $key => $value) {
            if ($dump_hab <= $value && $key > $dumpNote) {
                $dumpNote = $key;
            }
        }

        return $dumpNote;
    }

    public function noteDump()
    {
        $c = $this->get_Dump();
        $test = $this->th_Calculate($c["total"], $c["hab"]);
        return view('index', ['th' => $test]);
    }

    public function note_Finale_Dump()
    {
        $tr_dump = $this->get_Dump();
        $test = $tr_dump["tr"];
        $th_dump = $this->th_Calculate($tr_dump["total"], $tr_dump["hab"]);

        $nd = 0.7 * $test + 0.3 * $th_dump;
        $b = number_format($nd, 2);

        return view('index', ['notedechets' => $b]);
    }

    public function affichage()
    {
        return view('layouts/aff');
    }
/*-----------------------------------------------------Début fonction Antenne-----------------------------------------------*/
    // public function get_Antenne($RAYON)
    // {
    //     $test = "test affichage";
    //     $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C' . $RAYON;
    //     $antenne = file_get_contents($url_antenne);
    //     $json_antenne = json_decode($antenne);
    //     dd($json_antenne);
    //     return $json_antenne;
    // }
    //-------------------------------- Stockage déchets dans la base de données

    // public function store_Dump(Request $request)
    // {
    //     $dump = $this->note_Finale_Dump();
    //     $dum = new Dumtable();
    //     $dum->dumQty = $request->$dump;
    //     $dum->save();
    // }

    //--------------------- fin stockage
    public function calc_Antenne($RAYON)
    {
        if ($RAYON < 0 || $RAYON <= 300) {
            $url_antenne = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=sites_mobiles_2g-3g-4g_france_metropolitaine%40public&facet=technologies&facet=commune&facet=nom_epci&geofilter.distance=41.56027025699052%2C9.317871286694595%2C' . $RAYON;
            $antenne = file_get_contents($url_antenne);
            $json_antenne = json_decode($antenne);
            $note = array(0 => 10, 1 => 7, 2 => 6, 3 => 5, 4 => 4, 5 => 3, 6 => 2, 7 => 1, 8 => 0, 9 => 0, 10 => 0);
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
