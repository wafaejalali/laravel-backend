<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;
    protected $table='chauffeur';
    protected $primaryKey="id_chauffeur";
    protected $fillable=[
        'nom',
        'prenom',
        'date_de_naissance',
        'username',
        'password'
    ];
}
