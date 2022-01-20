<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Matrice;
use Illuminate\Http\Request;
use App\Models\Lieu;
use App\Models\Analys; 

use App\Http\Controllers\ActivityController;

class AnalyseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $analyse_table = (empty($request["matrice"])) ? "analyse_eau_potable" : $request["matrice"];
        $selectedMatrice = 2;
        if($analyse_table != 'analyse_eau_potable'){
            $selectedMatrice = $request["matrice"];
            $analyse_table = Matrice::find($analyse_table)['name'];
            $analyse_table = strtolower($analyse_table); 
            $analyse_table = str_replace(' ', '_', $analyse_table); 
            $analyse_table = "analyse_".$analyse_table;
            //echo  $analyse_table;
            //dd($request);
        }
        
        $listLieus = Lieu::get();
        $listMatrices = Matrice::get();
        $columns =  Schema::getColumnListing($analyse_table);
        $listData = DB::table($analyse_table)
        ->join("commandes","commandes.id","=", $analyse_table.".commande_id")
        ->join("lieus","lieus.id","=", $analyse_table.".lieu_id")
        ->select($analyse_table.".*","commandes.code_commande","lieus.lieu as lieu")
        ->orderBy($analyse_table.".id","asc")
        ->paginate(8);
        return view("analyses.index",["columns" => $columns,"listData" => $listData,"listLieus" =>$listLieus,"listMatrices" => $listMatrices,"selectedMatrice" => $selectedMatrice]);

    }

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
    public function update(Request $request)
    {
        $table = $request["selectedMatrice"];
        $table = Matrice::find($table)['name'];
        $table = strtolower($table); 
        $table = str_replace(' ', '_', $table); 
        $table = "analyse_".$table;
        $columns =  Schema::getColumnListing($table);
        $count = count($columns);
        ///dd($request);
        for($i = 0 ; $i<$count;$i++){
            $column = $columns[$i];
            if($column == "deleted_at" || $column == "id" || $column == "created_at" || $column == "updated_at" || $column == "commande_id" ){
                unset($columns[$i]);
            }
        }        
        for($i = 0 ; $i<count($request["id"]);$i++){
            $analyseData = [];
            foreach ($columns as $column){
                array_push($analyseData,[$column => $request[$column][$i]]);
            }
            $analyseData = call_user_func_array('array_merge', $analyseData);
            $analyse = DB::table($table)
            ->where('id', '=', $request["id"][$i])
            ->update($analyseData);
            Analys::updateActivity(null,"analyse ".$request["id"][$i]." update");
        }
        return redirect()->back()->with('success','Les analyses modifiée avec succès');
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
