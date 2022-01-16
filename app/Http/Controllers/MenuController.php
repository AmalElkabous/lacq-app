<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Matrice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        //
        $listMatrice = Matrice::get();
        $listMenu = Menu::join('matrices', 'matrices.id', '=', 'menus.matrice_id')
        ->select("menus.*","matrices.name as matrice")
        ->orderBy('menus.id', 'asc')
        ->paginate(8);
        $listMenu->setPath('/menus');
        return view("menus.index",["listMenu" => $listMenu,"listMatrice" => $listMatrice]);
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

        $menu= new Menu();
        $menu->name = $request->input("name");
        $menu->matrice_id = $request->input("matrice");
        $menu->prix_ht = $request->input("prix_ht");     
        $menu->prix_supv = $request->input("prix_supv");   
        $menu->save();
        return redirect()->back()->with('success','Menu ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $menu = Menu::find($id);
        echo json_encode($menu);
        exit();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request["name"] = Str::upper($request["name"]);

        //
        $menu= Menu::find($id);
        $menu->name = $request->input("name");
        $menu->matrice_id = $request->input("matrice");
        $menu->prix_ht = $request->input("prix_ht");     
        $menu->prix_supv = $request->input("prix_supv");   
        $menu->save();
        return redirect()->back()->with('success','Menu mis à jour avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->back()->with('success','Menu supprimer avec success');
    }
    public static function search(Request $request){
        $buffer = $request->input("buffer");
        if(empty($buffer)) return self::index();
        $listMatrice = Matrice::get();
        $listMenu = Menu::join('matrices', 'matrices.id', '=', 'menus.matrice_id')
        ->select("menus.*","matrices.name as matrice")
        ->where("menus.name", 'LIKE', '%' . $buffer . '%')
        ->orWhere("matrices.name", 'LIKE', '%' . $buffer . '%')
        ->orWhere("menus.prix_ht", 'LIKE', '%' . $buffer . '%')
        ->orderBy('menus.id', 'asc')
        ->get();
        return view("menus.index",["listMenu" => $listMenu,"listMatrice" => $listMatrice]);
    }
}
