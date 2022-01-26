<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lieu;

class LieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listLieus = Lieu::paginate(8);
        $listLieus->setPath('/lieus');
        return view("lieus.index",["listLieus" => $listLieus]);
    }
    public function json()
    {
        $listLieus = Lieu::paginate(8);
        $table = view('lieus.table', compact('listLieus'))->render();
        return response()->json(compact('table')); 
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
        $lieu= new Lieu();
        $lieu->lieu = $request->input("lieu");     
        $lieu->save();
        return response()->json(['status' => true,'message' => 'Lieu ajoutée avec succès']); 
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
        $lieu = Lieu::find($id);
        return response()->json($lieu); 

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
        $lieu = Lieu::find($id);
        $lieu->lieu = $request->input("lieu");     
        $lieu->save();
        return response()->json(['status' => true,'message' => 'Lieu modifiée avec succès']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lieu = Lieu::find($id);
        $lieu->delete();
        return response()->json(['status' => true,'message' => 'Lieu supprimée avec succès']); 
    }
}
