<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUsers = User::join('roles', 'roles.id', '=', 'users.role_id')
        ->select('users.*', 'roles.role')
        ->paginate(8);
        return view("users.index",["listUsers" => $listUsers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input("name");
        $user->last_name = $request->input("last_name");
        $user->email = $request->input("email");
        $user->role_id = $request->input("user_role");
        $user->password = Hash::make($request->input("password"));        
        if($request->hasFile('uAvatar')){
            $data=$request->input('uAvatar');
            $photo=$request->file('uAvatar')->getClientOriginalName();
            $destination=base_path().'/public/img';
            $request->file('uAvatar')->move($destination, $photo);
            $input = $request->all();
        }else{
            $photo ="user.png";
        }
        $user->avatar =  $photo;
        $user->save();
        return redirect()->back()->with('success','utilisateur ajouté avec succès');
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
        $user = User::join('roles', 'roles.id', '=', 'users.role_id')
        ->select('users.name','users.role_id',"users.id",'users.last_name','users.email','users.avatar')
        ->where('users.id', '=', $id)
        ->first();
        echo json_encode($user);
        exit();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function passwordValidation($oldPassword = null ,$password,$confirmPassword){
        if($oldPassword != null){
            if(!Hash::check($oldPassword, Auth::user()->password)){
                return array("valid" => false,"msg" => "Erreur password incorrect");
            }
        }
        if(strlen($password) < 8){
            return array("valid" => false,"msg" => "Erreur password doit < 8 ");
        }
        if($password != $confirmPassword){
            return array("valid" => false,"msg" => "Erreur de confirmation du password");
        }
        return array("valid" => true,"msg" => "");
    }
    public function update(Request $request, $id = null)
    {
        //
        if(!empty($request->input("oldPassword"))){
            $passwordValidation = self::passwordValidation($request->input("oldPassword"),$request->input("password"),$request->input("password_confirmation"));
            if($passwordValidation["valid"] == false)
            return redirect()->back()->with('error',$passwordValidation["msg"]);
        }
        if(!empty($request->input("password"))){
            $passwordValidation = self::passwordValidation(null,$request->input("password"),$request->input("password_confirmation"));
            if($passwordValidation["valid"] == false)
            return redirect()->back()->with('error',$passwordValidation["msg"]);
        }
        
        ($id == null) ? $id = Auth::user()->id : $id = $id;
        $user = User::find($id);
        $user->name = $request->input("name");
        $user->last_name = $request->input("last_name");
        $user->email = $request->input("email");
        if(Auth::user()->id == $id) $user->role_id = Auth::user()->role_id;
        else $user->role_id = $request->input("user_role");
        
        $user->password = Hash::make($request->input("password"));        
        if($request->hasFile('uAvatar')){
            $data=$request->input('uAvatar');
            $photo=$request->file('uAvatar')->getClientOriginalName();
            $destination=base_path().'/public/img';
            $request->file('uAvatar')->move($destination, $photo);
            $input = $request->all();
        }else{
            $photo ="user.png";
        }
        $user->avatar =  $photo;
        $user->save();
        return redirect()->back()->with('success','utilisateur modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success','utilisateur supprimé avec succès');
    }
}
