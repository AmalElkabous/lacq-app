<?php

namespace App\Http\Controllers;
use App\Services\PayUService\Exception;
use App\Models\Commande;
use App\Models\Commercial;
use App\Models\Commantaire;
use App\Models\Matrice;
use App\Models\Menu;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public static function index()
    {
        //
        $listMatrices = Matrice::get();
        $listCultures = Commande::select('culture')->distinct()->get();
        $listNatures  = Commande::select('nature')->distinct()->get();
        $listVarites  = Commande::select('varite')->distinct()->get();
        $listCommercials  = Commercial::get();
        $listClients  = Client::get();
        $listCommandes  = Commande::join('clients', 'clients.id', '=', 'commandes.client_id')
        ->join('commercials', 'commercials.id', '=', 'commandes.commercial_id')
        ->join('menus', 'menus.id', '=', 'commandes.menu_id')
        ->select("commandes.*","menus.name as menu","clients.exploiteur as client","commercials.name as commercial")
        ->paginate(8);
        $listCommandes->setPath('/commandes');
        return view("commandes.index",["listCommandes" => $listCommandes,"listMatrices" => $listMatrices,"listCultures" => $listCultures ,"listNatures" => $listNatures , "listVarites" => $listVarites, "listCommercials" => $listCommercials,"listClients" => $listClients,"state" => 0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listMatrices = Matrice::get();
        $listCultures = Commande::select('culture')->distinct()->get();
        $listNatures  = Commande::select('nature')->distinct()->get();
        $listVarites  = Commande::select('varite')->distinct()->get();
        $listCommercials  = Commercial::get();
        $listClients  = Client::get();
        return view("commandes.create",["listMatrices" => $listMatrices,"listCultures" => $listCultures ,"listNatures" => $listNatures , "listVarites" => $listVarites, "listCommercials" => $listCommercials,"listClients" => $listClients]);
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
        //echo print_r($request);
        $cin_rc = $request["client"][0];
        $id_client = Client::select("id")->where("cin_rc","=",$cin_rc)->first()["id"];
        $commercial = $request->input("commercial");
        $id_commercial = Commercial::select("id")->where("name","=",$commercial)->first()["id"];
        //print_r($request->input());
        //echo json_encode($request->input());
        for($i = 0 ; $i<count($request["matrice"]);$i++){
            $commande = new Commande();
            $commande->code_commande = null;
            $commande->client_id = $id_client;
            $commande->commercial_id = $id_commercial;
            $commande->menu_id = $request["menu"][$i];
            $commande->ref_client = $request["ref_client"][$i];
            $commande->nature = $request["nature"][$i];
            $commande->culture = $request["culture"][$i];
            $commande->varite = $request["varite"][$i];
            $commande->gps_1 = $request["gps_1"][$i];
            $commande->gps_2 = $request["gps_2"][$i];
            $commande->horizon_1 = $request["horizon_1"][$i];
            $commande->horizon_2 = $request["horizon_2"][$i];
            $commande->temperature = $request["temperateur"][$i];
            $commande->date_reception = $request["date_reception"][0];
            $commande->date_prelevement = $request["date_prelevement"][$i];
            $commande->date_edition = date('Y-m-d');
            $commande->state =  "En cours";
            $commande->save();
        }
        return redirect()->back()->with('success','Commande ajouter avec success');
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
        $commmande = Commande::join('commercials', 'commercials.id', '=', 'commandes.commercial_id')
        ->join('menus', 'menus.id', '=', 'commandes.menu_id')
        ->join('matrices', 'matrices.id', '=', 'menus.matrice_id')
        ->select("commandes.*","commercials.name as commercial","matrices.id as matrice_id")
        ->where("commandes.id","=",$id)
        ->first();
        echo json_encode($commmande);
        exit();
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
        $commercial = $request->input("commercial");
        $id_commercial = Commercial::select("id")->where("name","=",$commercial)->first()["id"];

        $commande = Commande::find($id);
        $commande->client_id = $request->input("client");
        $commande->commercial_id = $id_commercial;
        $commande->menu_id = $request->input("menu");
        $commande->ref_client = $request->input("ref_client");
        $commande->nature = $request->input("nature");
        $commande->culture = $request->input("culture");
        $commande->varite = $request->input("varite");
        $commande->gps_1 = $request->input("gps_1");
        $commande->gps_2 = $request->input("gps_2");
        $commande->horizon_1 = $request->input("horizon_1");
        $commande->horizon_2 = $request->input("horizon_2");
        $commande->temperature = $request->input("temperateur");
        $commande->date_reception = $request->input("date_reception");
        $commande->date_prelevement = $request->input("date_prelevement");
        $commande->save();
        
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

    /////////////////////////////////////////////////////////
    public function genirationCodeCommande($id){
        $codeMatrice = Commande::join("menus","commandes.menu_id","=","menus.id")
        ->join("matrices","menus.matrice_id","=","matrices.id")
        ->select("matrices.code as startCode")
        ->where("commandes.id","=",$id)
        ->first()["startCode"];
        $lastCode = Commande::select("code_commande as code")
        ->where("code_commande","like",$codeMatrice."%")
        ->orderByRaw('updated_at desc')
        ->first();
        echo $lastCode;
        (!empty($lastCode)) ? $code = $lastCode["code"] + 1 : $code = $codeMatrice."001";
        return  $code;
    }
    public static function search(Request $request){
        $buffer = $request->input("buffer");
        if(empty($buffer)) return self::index();
        $listMatrices = Matrice::get();
        $listCultures = Commande::select('culture')->distinct()->get();
        $listNatures  = Commande::select('nature')->distinct()->get();
        $listVarites  = Commande::select('varite')->distinct()->get();
        $listCommercials  = Commercial::get();
        $listClients  = Client::get();
        $statu = "En cours";
        $listCommandes = Commande::join('clients', 'clients.id', '=', 'commandes.client_id')
        ->join('commercials', 'commercials.id', '=', 'commandes.commercial_id')->join('menus', 'menus.id', '=', 'commandes.menu_id')
        ->select("commandes.*","menus.name as menu","clients.exploiteur as client","commercials.name as commercial")
        ->where("commandes.id", 'LIKE', '%' . $buffer . '%')
        ->orWhere("code_commande", 'LIKE', '%' . $buffer . '%')
        ->orWhere("date_reception", 'LIKE', '%' . $buffer . '%')
        ->orWhere("commercials.name", 'LIKE', '%' . $buffer . '%')
        ->orWhere("clients.exploiteur", 'LIKE', '%' . $buffer . '%')
        ->orWhere("menus.name", 'LIKE', '%' . $buffer . '%')
        ->get();
        return view("commandes.index",["listCommandes" => $listCommandes ,"listMatrices" => $listMatrices,"listCultures" => $listCultures ,"listNatures" => $listNatures , "listVarites" => $listVarites, "listCommercials" => $listCommercials,"listClients" => $listClients,"state" => 0]);

    }
    public static function getCommandesWhereState($state)
    {
        $listMatrices = Matrice::get();
        $listCultures = Commande::select('culture')->distinct()->get();
        $listNatures  = Commande::select('nature')->distinct()->get();
        $listVarites  = Commande::select('varite')->distinct()->get();
        $listCommercials  = Commercial::get();
        $listClients  = Client::get();
        switch($state){
            case 0: $statu = ""; break;
            case 1: $statu = "En cours"; break;
            case 2: $statu = "Valid"   ; break;
            case 3: $statu = "Rejete"  ; break;
            default: abort(404);
        }
        if($statu != "")
        $listCommandes  = Commande::join('clients', 'clients.id', '=', 'commandes.client_id')
        ->join('commercials', 'commercials.id', '=', 'commandes.commercial_id')->join('menus', 'menus.id', '=', 'commandes.menu_id')
        ->select("commandes.*","menus.name as menu","clients.exploiteur as client","commercials.name as commercial")
        ->where("state","=",$statu)
        ->paginate(8);
        else
        $listCommandes  = Commande::join('clients', 'clients.id', '=', 'commandes.client_id')
        ->join('commercials', 'commercials.id', '=', 'commandes.commercial_id')->join('menus', 'menus.id', '=', 'commandes.menu_id')
        ->select("commandes.*","menus.name as menu","clients.exploiteur as client","commercials.name as commercial")
        ->paginate(8);

        return view("commandes.index",["listCommandes" => $listCommandes ,"listMatrices" => $listMatrices,"listCultures" => $listCultures ,"listNatures" => $listNatures , "listVarites" => $listVarites, "listCommercials" => $listCommercials,"listClients" => $listClients,"state" => $state]);
    }
    public function valider($id){
        
        try{
            $commande = Commande::find($id);
            $commande->code_commande = (empty($commande->code_commande)) ? self::genirationCodeCommande($id) : $commande->code_commande;
            $commande->state = "Valid";
            $commande->save();
            return redirect()->back()->with('success','Commande valider avec success'); 
        }catch(\Exception $e){
            echo $e->getMessage();
            //return redirect()->back()->with('error','Commande n\'pas valider !');
            
        }
    }
    public function reject(Request $request){
        $validated = $request->validate([
            'commantaire' => 'required|min:1',
        ]);
        $commande_id = $request->input("commande_id");
        $commantaire = new Commantaire();
        $commantaire->commande_id = $commande_id;
        $commantaire->user_id = Auth::user()->id;
        $commantaire->content = $request->input("commantaire");
        $commantaire->save();
        $commande = Commande::find($commande_id);
        $commande->state = "Rejete";
        $commande->save();
        return redirect()->back()->with('success','Commande rejete avec success');
    }
    public function menuOfMatrice($matrice_id){
        $listMenus = Menu::where("matrice_id","=",$matrice_id)
        ->select("id","name")
        ->get();
        echo json_encode($listMenus);
    }
    public function getCommantaire($commande_id){
        $commantaire = Commantaire::select("content as commantaire")
        ->where("commande_id","=",$commande_id)
        ->orderByRaw('id desc')
        ->first();
        echo json_encode($commantaire);
    }

}
