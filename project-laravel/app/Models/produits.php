<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produits extends Model
{
    use HasFactory;
    protected $fillable=[
        'fournisseur',
        'produit',
        'famille',
        'photo',
        'image1',
        'image2',
        'image3',
        'pv',
        'pa',
        'description',
        'reference',
    ];
}
