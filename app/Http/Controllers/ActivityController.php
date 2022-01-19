<?php

namespace App\Http\Controllers;
use Spatie\Activitylog\Contracts\Activity;
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
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Notification;
use Spatie\Activitylog\Models\Activity;


class ActivityController extends Controller
{
    //
    public function index(){
        $Activitys = Activity::paginate(8);
        //dd($Activitys);
        return view("Activitys.index",["Activitys" => $Activitys]);
    }
    public static  function updateActivity($model,$msg){
        activity("update")
        ->causedBy(Auth::user()->id)
        ->performedOn($model)
        ->log($msg);
    }
    public static  function deleteActivity($model,$msg){

        activity("delete")
        ->causedBy(Auth::user()->id)
        ->performedOn($model)
        ->log($msg);
    }
    public static function addActivity($model,$msg){
        activity("add")
        ->causedBy(Auth::user()->id)
        ->performedOn($model)
        ->log($msg);
    }
    public static function CommandeValider($commandeId){
        activity("commande valider")
        ->causedBy(Auth::user()->id)
        ->performedOn(new commande())
        ->log($commandeId);
    }
    public static function CommandeRejter($commandeId){
        activity("Commande rejeter")
        ->causedBy(Auth::user()->id)
        ->performedOn(new commande())
        ->log($commandeId);
    }
    /////////////////---------------------------------------------------------------///////////////////

    public static function loginActivity($model){

        activity("update")
        ->causedBy(Auth::user()->id)
        ->performedOn($model)
        ->log('show commande table');
    }
    public static function logoutActivity($model){

        activity("update")
        ->causedBy(Auth::user()->id)
        ->performedOn($model)
        ->log('show commande table');
    }
    
}
