<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;
    protected $table='voyages';
    protected $primaryKey="id_voyage";
    protected $fillable=[
        'destination',
        'date_depart',
        'date_arrive',
        'duree',
        'consommation',
        'date_programmer',
        'id_vahicule'
    ];
}
