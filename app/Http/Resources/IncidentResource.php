<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IncidentResource extends JsonResource
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
            'id_incident' => $this->id_incident,
            'date_incident' => $this->date_incident,
            'lieu' => $this->lieu,
            'personne_impliquees' => $this->personne_impliquees,
            'pert'=> $this->pert,
            'etat_incident' => $this->etat_incident,
            'id_voyage' => $this->id_voyage,

        ];
    }

}
