<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lieu;

<<<<<<< HEAD
=======

>>>>>>> development
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
<<<<<<< HEAD
        $listLieus->setPath('/lieus');
        return view("lieus.index",["listLieus" => $listLieus]);
    }
    public function json()
    {
        $listLieus = Lieu::paginate(8);
        $table = view('lieus.table', compact('listLieus'))->render();
        return response()->json(compact('table')); 
    }
=======
        return view("lieus.index",["listLieus" => $listLieus]);
    }

>>>>>>> development
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
<<<<<<< HEAD
        $lieu= new Lieu();
        $lieu->lieu = $request->input("lieu");     
        $lieu->save();
        return response()->json(['status' => true,'message' => 'Lieu ajoutée avec succès']); 
=======
>>>>>>> development
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
<<<<<<< HEAD
        return response()->json($lieu); 

=======
        echo json_encode($lieu);
        exit();
>>>>>>> development
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
<<<<<<< HEAD
        $lieu = Lieu::find($id);
        $lieu->lieu = $request->input("lieu");     
        $lieu->save();
        return response()->json(['status' => true,'message' => 'Lieu modifiée avec succès']); 
=======
        //
>>>>>>> development
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
<<<<<<< HEAD
        return response()->json(['status' => true,'message' => 'Lieu supprimée avec succès']); 
=======
        return redirect()->back()->with('success','Matrice supprimée avec succès');
>>>>>>> development
    }
}
