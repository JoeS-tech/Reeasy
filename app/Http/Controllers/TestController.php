<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
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
/*Code abdel Début ------------------------------------------début -- abdel-----------------------*/
public function get_Pollution()
    {

        function read($csv)
        {
            $file = fopen($csv, 'r');
            while (!feof($file)) {
                $lines[] = fgetcsv($file);
            }
            fclose($file);
            return $lines;
            /* $dept = $line[1][1];
            $nom_poll = $line[1][8];
            $valeur = $line[1][10];
            $unite = $line[1][11];
            $date = $line[1][14];
            dd($dept, $nom_poll, $valeur, $unite, $date);*/
        }

        // Définir le chemin d'accès au fichier CSV
        $csv = 'https://trouver.datasud.fr/dataset/c9b4ec5b-fa45-4d71-b72a-9a067564b3fe/resource/787a02c2-0ae6-43d9-ab08-aecc6a56435e/download/mes_sudpaca_annuelle.csv';

        $lines = read($csv);
        // echo '<pre>';
        $filterlines = array_filter($lines, function ($line) {
            return $line[1] === "ALPES-MARITIMES" && in_array($line[8], ["NO2", "PM10", "O3", "PM2.5", "BAP"]);
        });

        // var_dump($filterlines);
        //echo '</pre>';


        $no2 = array_reduce(
            $filterlines,
            function ($total, $line) {
                if ($line[8] === "NO2") {
                    return ["nombre_de_releves" => $total["nombre_de_releves"] + 1, "total" => $total["total"] + $line[10]];
                } else {
                    return $total;
                }
            },
            ["nombre_de_releves" => 0, "total" => 0]
        );

        $no2 = ($no2["total"] / $no2["nombre_de_releves"]);
        return $no2;
        //dd($no2);
    }

    $pollution = get_Pollution();

   function get_Note_Pollution($pollution)
    {   $note=15;
        $notes = [10, 7.5, 5, 2.5, 0];

        if ($pollution> 0 && $pollution <= 20) {
           $note= $notes[0];
        } elseif ($pollution <= 30) {
            $note=$notes[1];
        } elseif ($pollution <= 40) {
            $note=$notes[2];
        } elseif ($pollution <= 50) {
            $note=$notes[3];
        } else {
           $note= $notes[4];
        }
       // dd($note);
       echo $note;
        return $note;
    }
   // echo get_Note_Pollution(15);





/*Code abdel Fin ------------------------------------------fin -- abdel---------------------------*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

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
    // public function show($id)
    // {
    //     //
    // }

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
