<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoyageResource extends JsonResource
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
            'id_voyage' => $this->id_voyage,
            'destination' => $this->destination,
            'date_depart' => $this->date_depart,
            'date_arrive' => $this->date_arrive,
            'duree' => $this->duree,
            'consommation' => $this->consommation,
            'date_programmer' => $this->date_programmer,
            'id_vehicule' => $this->id_vehicule,
        ];
    }
}
