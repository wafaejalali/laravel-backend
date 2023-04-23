<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vahicule extends Model
{
    use HasFactory;
    protected $table='vehicules';
    protected $primaryKey="id_vehicule";
    protected $fillable=[
        'modele',
        'matricule',
        'couleur',
        'Transmission',
        'id_chauffeur'
    ];
}
