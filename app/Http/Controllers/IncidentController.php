<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vahicule;
use App\Models\Voyage;
use App\Models\Incident;
class IncidentController extends Controller
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
        $id_vahicule=Vahicule::where('matricule','=',$request->matricule)->first()->id_vahicule;
        $id_voyage=Voyage::where('destination','=',$request->destination)->where('id_vahicule', '=', $id_vahicule)->first()->id_voyage;

        Incident::create([
            'date_incident' => $request->date_incident,
            'lieu' => $request->lieu,
            'personne_impliquees' => $request->personne_impliquees,
            'pert'=> $request->pert,
            'etat_incident' => $request->etat_incident,
            'id_voyage' => $id_voyage,
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
        $incidents=Incident::where('id_voyage','=',$id)->get();
        return['incidents'=>$incidents];
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
        if(Incident::where('id_incident',$id)->exists()){
            $admin=Incident::find($id);
            $id_vahicule=Vahicule::where('matricule','=',$request->matricule)->first()->id_vahicule;

            if(Voyage::where('destination','=',$request->destination)->where('id_vahicule', '=', $id_vahicule)->first()!=null){
                $id_voyage=Voyage::where('destination','=',$request->destination)->where('id_vahicule', '=', $id_vahicule)->first()->id_voyage;
                $admin->id_incident = $id;
                $admin->lieu = $request->lieu;
                $admin->personne_impliquees = $request->personne_impliquees;
                $admin->pert = $request->pert;
                $admin->etat_incident = $request->etat_incident;
                $admin->id_voyage=$id_voyage;
                $admin->save();
                return response()->json(["message"=>"updated succesfully"],200);}
            else{
                return response()->json(["message"=>"cette voyage n'existe pas"],400);
            }

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
        if(Incident::where('id_incident',$id)->exists()){
            $admin=Incident::find($id);
            $admin->delete();
            return response()->json(["message"=>"delete succesfully"],200);
        }else{
            return response()->json(["message"=>"delete unsuccesfully"],400);
        }
    }
}
