<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table='admins';
    protected $primaryKey="id_admin";
    protected $fillable=[
        'nom',
        'prenom',
        'date_de_naissance',
        'username',
        'password'
    ];
}
