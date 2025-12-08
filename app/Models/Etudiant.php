<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //use HasFactory;

      protected $table = 'etudiants';
    protected $fillable = [
        'Nom',
        'Prenom',
        'Email',
         'user_id',
        // 'Grade',
        'Class',
        'GPA',
        'Attendance',
    ];

   
public function user() {
    return $this->belongsTo(User::class);
}

    protected $hidden = [
        'password', 'remember_token',
    ];
    
}
