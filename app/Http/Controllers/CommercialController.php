<?php

namespace App\Http\Controllers;

use App\Models\Commercial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CommercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        //
        $listCommercials = Commercial::orderBy('id', 'asc')
        ->paginate(8);
        //dd($listCommercials);
        $listCommercials->setPath('/commercials');
        return view("commercials.index",["listCommercials" => $listCommercials]);
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
        $request["name"] = Str::upper($request["name"]);
        $request["zone"] = Str::upper($request["zone"]);
        $commercial= new Commercial();
        $commercial->name = $request->input("name");
        $commercial->zone = $request->input("zone");
        $commercial->email = $request->input("email");
        $commercial->save();
        ActivityController::addActivity(new Commercial(),$commercial->id);
        return redirect()->back()->with('success','Commercial ajouter avec success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function show(Commercial $commercial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $commercial = Commercial::find($id);
        echo json_encode($commercial);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request["name"] = Str::upper($request["name"]);
        $request["zone"] = Str::upper($request["zone"]);
        $commercial=  Commercial::find($id);
        $commercial->name = $request->input("name");
        $commercial->zone = $request->input("zone");
        $commercial->email = $request->input("email");
        $commercial->save();
        ActivityController::updateActivity(new Commercial(),$id);
        return redirect()->back()->with('success','Commercial modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $commercial = Commercial::find($id);
        $commercial->delete();
        ActivityController::deleteActivity(new Commercial(),$id);
        return redirect()->back()->with('success','Commercial supprimer avec success');
    }
    public static function search(Request $request){
        $buffer = $request->input("buffer");
        if(empty($buffer)) return self::index();
        $listCommercials = Commercial::where("zone", 'LIKE', '%' . $buffer . '%')
        ->orWhere("name", 'LIKE', '%' . $buffer . '%')
        ->orderBy('id', 'asc')
        ->get();
        return view("commercials.index",["listCommercials" => $listCommercials]);
    }
}
