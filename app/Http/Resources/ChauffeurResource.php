<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChauffeurResource extends JsonResource
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
            'id_chauffeur' => $this->id_chauffeur,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'date_de_naissance' => $this->date_de_naissance,
            'username' => $this->username,
            'password' => $this->password,
        ];
    }
}
