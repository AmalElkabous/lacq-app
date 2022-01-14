<?php

namespace App\Http\Controllers;
use App\Models\Commande;
use App\Models\Commercial;
use App\Models\Commantaire;
use App\Models\Matrice;
use App\Models\Menu;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $listCommandes  = Commande::join('clients', 'clients.id', '=', 'commandes.client_id')
        ->join('commercials', 'commercials.id', '=', 'commandes.commercial_id')
        ->join('menus', 'menus.id', '=', 'commandes.menu_id')
        ->join('matrices', 'matrices.id', '=', 'menus.matrice_id')
        ->select("commandes.*","menus.name as menu","matrices.name as matrice","matrices.delai as matriceDelai","clients.exploiteur as client","commercials.name as commercial")
        ->where("commandes.state","=","Valid")
        ->paginate(8);
        foreach($listCommandes as &$row) {
            $delai = $row['matriceDelai'];
            $dtRc = $row['date_reception'];
            $origin = date_create($dtRc);
            $target = date_create(date('Y-m-d'));
            $deltaDate = date_diff($origin, $target);
            $tempReel = intval($delai) - intval($deltaDate->format('%a'));
            $tempLabo = $tempReel -1;
            $tempClient = 8 - intval($deltaDate->format('%a'));
            $row->tempLabo = $tempLabo;
            $row->tempClient = $tempClient;
            $row->tempReel = $tempReel;
        }
        //dd($listCommandes);
        
        return view("dashboard.index",["listCommandes" => $listCommandes]);
    }
}
