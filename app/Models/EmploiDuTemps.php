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
        'matiere_id',
        'class',
        'professeur',
    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
