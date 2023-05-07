<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            'id_admin' => $this->id_admin,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'date_de_naissance' => $this->date_de_naissance,
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password,
        ];
    }
}
