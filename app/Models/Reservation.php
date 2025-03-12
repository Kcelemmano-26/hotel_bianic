<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'email', 'telephone', 'chambre', 'arrivee', 'depart', 'personnes', 'nombre_enfants', 'message',
    ];
}
