<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paniers extends Model
{
    use HasFactory;
    protected $fillable=[
        'client',
        'matricule',
        'image',
        'prix',
        'produit',
        'quantite',
        'reference',
    ];
}