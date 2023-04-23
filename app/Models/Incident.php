<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;
    protected $table='incidents';
    protected $primaryKey="id_incident";
    protected $fillable=[
        'date_incident',
        'lieu',
        'personne_impliquees',
        'pert',
        'etat_incident',
        'id_voyage'
    ];
}
