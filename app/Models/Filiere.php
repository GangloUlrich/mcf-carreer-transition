<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'libelle',
        'ecole_id'
    ];

    public static  $rules = [
        'libelle' => 'required|string|unique:filieres',
    ];

    public function ecole() {
        return $this->belongsTo(Ecole::class);
    }
}
