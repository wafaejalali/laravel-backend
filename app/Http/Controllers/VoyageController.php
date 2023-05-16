<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voyage;
use App\Models\Vahicule;
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
    {   $request->validate([
        'destination'=>'required|string|max:30',
        'matricule'=>'required|string|max:30',
        'date_depart'=>'required|date',
        'date_arrive'=>'required|date',
        'date_programmer'=>'required|date',
      ]);

        $id_vahicule=Vahicule::where('matricule','=',$request->matricule)->first()->id_vahicule;
        Voyage::create([
            'id_voyage' => $request->id_voyage,
            'destination' => $request->destination,
            'date_depart' => $request->date_depart,
            'date_arrive' => $request->date_arrive,
            'duree' => $request->duree,
            'consommation' => $request->consommation,
            'date_programmer' =>$request->date_programmer,
            'id_vahicule' =>$id_vahicule,
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
    {    $request->validate([
        'destination'=>'required|string|max:30',
        'matricule'=>'required|string|max:30',
        'date_depart'=>'required|date',
        'date_arrive'=>'required|date',
        'date_programmer'=>'required|date',
      ]);

        if(Voyage::where('id_voyage',$id)->exists()){
            $admin=Voyage::find($id);
            $id_vahicule=Vahicule::where('matricule','=',$request->matricule)->first()->id_vahicule;
            $admin->id_voyage = $id;
            $admin->destination = $request->destination;
            $admin->date_depart = $request->date_depart;
            $admin->date_arrive = $request->date_arrive;
            $admin->duree = $request->duree;
            $admin->consommation= $request->consommation;
            $admin->date_programmer= $request->date_programmer;
            $admin->id_vahicule= $id_vahicule;
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
