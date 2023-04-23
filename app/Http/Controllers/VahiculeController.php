<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chauffeur;
use App\Models\Vahicule;
class VahiculeController extends Controller
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
        $id_chauffeur=Chauffeur::where('nom','=',$request->chauffeur)->first()->id_chauffeur;
        Vahicule::create([
            'modele' => $request->modele,
            'matricule' => $request->matricule,
            'couleur' => $request->couleur,
            'Transmission' => $request->Transmission,
            'id_chauffeur' => $id_chauffeur,
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
        if(Vahicule::where('id_vahicule',$id)->exists()){
            $admin=Vahicule::find($id);
            $id_chauffeur=Chauffeur::where('nom','=',$request->chauffeur)->first()->id_chauffeur;
            $admin->id_vahicule = $id;
            $admin->modele = $request->modele;
            $admin->matricule = $request->matricule;
            $admin->couleur = $request->couleur;
            $admin->Transmission = $request->Transmission;
            $admin->id_chauffeur=$id_chauffeur;
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
        if(Vahicule::where('id_vahicule',$id)->exists()){
            $admin=Vahicule::find($id);
            $admin->delete();
            return response()->json(["message"=>"delete succesfully"],200);
        }else{
            return response()->json(["message"=>"delete unsuccesfully"],400);
        }
    }
}
