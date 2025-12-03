<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //use HasFactory;
    protected $fillable = [
        'Nom',
        'Prenom',
        'Email',
        'Grade',
        'Class',
        'GPA',
        'Attendance',
    ];
    
}
