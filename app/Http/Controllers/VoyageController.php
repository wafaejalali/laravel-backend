<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Voyage;
use App\models\Vahicule;
class VoyageController extends Controller
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
    {   $id_vehicule=Vahicule::where('matricule','=',$request->matricule)->first()->id_vehicule;
        Voyage::create([
            'id_voyage' => $request->id_voyage,
            'destination' => $request->destination,
            'date_depart' => $request->date_depart,
            'date_arrive' => $request->date_arrive,
            'duree' => $request->duree,
            'consommation' => $request->consommation,
            'date_programmer' =>$request->date_programmer,
            'id_vehicule' =>$id_vehicule,
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
        if(Voyage::where('id_voyage',$id)->exists()){
            $admin=Voyage::find($id);
            $id_vehicule=Vahicule::where('matricule','=',$request->matricule)->first()->id_vehicule;
            $admin->id_voyage = $id;
            $admin->destination = $request->destination;
            $admin->date_depart = $request->date_depart;
            $admin->date_arrive = $request->date_arrive;
            $admin->duree = $request->duree;
            $admin->consommation= $request->consommation;
            $admin->date_programmer= $request->date_programmer;
            $admin->id_vehicule= $id_vehicule;
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
        if(Voyage::where('id_voyage',$id)->exists()){
            $admin=Voyage::find($id);
            $admin->delete();
            return response()->json(["message"=>"delete succesfully"],200);
        }else{
            return response()->json(["message"=>"delete unsuccesfully"],400);
        }
    }
}
