<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='admins';
    protected $primaryKey="id_admin";
    protected $fillable=[
        'nom',
        'prenom',
        'date_de_naissance',
        'username',
        'password'
    ];
     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',

    ];


}
