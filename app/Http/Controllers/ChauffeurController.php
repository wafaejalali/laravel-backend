<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Chauffeur;
class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Chauffeur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_de_naissance' => $request->date_de_naissance,
            'username' => $request->username,
            'password' => $request->password,
           ]);
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
    public function update(Request $request, $id)
    {
        if(Chauffeur::where('id_chauffeur',$id)->exists()){
            $admin=Chauffeur::find($id);
            $admin->id_chauffeur = $id;
            $admin->nom = $request->nom;
            $admin->prenom = $request->prenom;
            $admin->date_de_naissance = $request->date_de_naissance;
            $admin->username = $request->username;
            $admin->password= $request->password;
            $admin->save();
            return response()->json(["message"=>"updated succesfully"],200);
          }else{
              return response()->json(["message"=>"updated unsuccesfully"],400);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Chauffeur::where('id_chauffeur',$id)->exists()){
            $admin=Chauffeur::find($id);
            $admin->delete();
            return response()->json(["message"=>"delete succesfully"],200);
        }else{
            return response()->json(["message"=>"delete unsuccesfully"],400);
        }
    }
}