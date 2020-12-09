<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dum;

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
        $url_Dump= 'https://koumoul.com/s/data-fair/api/v1/datasets/performancescollecte-oma-par-type-dechet-pardept/lines?format=json&q=NUMERO_DEPARTEMENT&q_mode=simple';
        fetch($url_Dump)
        .then($response => ($dump = $response))
    },
    /*Function to store the recovered Dump value in the DB Table Dum*/

    public function store_Dump(Request $request)
    {
        $dum = new Dumtable();
        $dum->dumQty = $request->$dump;
        $dum->save();
    }

    //  file_get_contents— Lit tout un fichier dans une chaîne
    public function get_Pollution()
    {
        $pollution = file_get_contents('https://trouver.datasud.fr/dataset/c9b4ec5b-fa45-4d71-b72a-9a067564b3fe/resource/787a02c2-0ae6-
        43d9-ab08-aecc6a56435e/download/mes_sudpaca_annuelle.csv');
        echo $pollution;
    },


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
