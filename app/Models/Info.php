<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'photo',
        'resume',
        'birthday',
        'sexe',
        'phone',
        'cohorte',
        'secteur_id',
        'filiere_id',
        'ecole_id',
        'user_id'
    ];


    public function filiere(){
        $this->belongsTo(Filiere::class);
    }

    public function  ecole(){
        $this->belongsTo(Ecole::class);
    }

    public function secteur(){
        $this->belongsTo(Secteur::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }
}
