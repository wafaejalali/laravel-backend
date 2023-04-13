<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehiculeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_vehicule' => $this->id_vehicule,
            'modele' => $this->modele,
            'matricule' => $this->matricule,
            'couleur' => $this->couleur,
            'Transmission' => $this->Transmission,
            'id_chauffeur' => $this->id_chauffeur,
        ];
    }
}
