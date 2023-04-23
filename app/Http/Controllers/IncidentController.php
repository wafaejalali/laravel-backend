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
        $destination =$request->destination;
        $id_voyage=Voyage::where('destination','=',$request->destination)->where('id_vahicule', '=', $id_vahicule)->first()->id_voyage;
        Incident::create([
            'date_incident' => $request->date_incident,
            'lieu' => $request->lieu,
            'personne_impliquees' => $request->personne_impliquees,
            'pert'=> $request->pert,
            'etat_incident' => $request->etat_incident,
            'id_voyage' => $request->id_voyage,
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
        //
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
}
