<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiDuTemps extends Model
{
    use HasFactory;

    protected $table = 'emploi_du_temps';

    protected $fillable = [
        'jour',
        'heure_debut',
        'heure_fin',
        'class',
        'professeur',
        'matiere', // أضفناه هنا
    ];

    // لم تعد هناك علاقة matiere
}
