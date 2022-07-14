<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nom',
    ];

    public static  $rules = [
        'nom' => 'required|string|unique:ecoles',
    ];

    public function filieres(){
        return $this->hasMany(Filiere::class);
    }
}
