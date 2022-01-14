<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listClients = Client::paginate(8);
        return view("clients.index",["listClients" => $listClients]);
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
        $request["exploiteur"] = Str::upper($request["exploiteur"]);
        $request["organisme"] = Str::upper($request["organisme"]);

        $client= new Client();
        $client->cin_rc = $request->input("cin_rc");
        $client->address = $request->input("address");
        $client->exploiteur = $request->input("exploiteur");   
        $client->organisme = $request->input("organisme");    
        $client->save();
        return redirect()->back()->with('success','Client ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client = Client::find($id);
        echo json_encode($client);
        exit();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request["exploiteur"] = Str::upper($request["exploiteur"]);
        $request["organisme"] = Str::upper($request["organisme"]);

        $client= Client::find($id);
        $client->cin_rc  = $request->input("cin_rc");
        $client->address  = $request->input("address");
        $client->exploiteur = $request->input("exploiteur");   
        $client->organisme = $request->input("organisme");    
        $client->save();
        return redirect()->back()->with('success','Client mise a jour avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $client = Client::find($id);
        $client->delete();
        return redirect()->back()->with('success','Client supprimer avec success');
    }
}
