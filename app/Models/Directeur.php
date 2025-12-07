<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directeur extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nom',
        'Prenom',
         'user_id',
         'Telephone',
         'Bureau',
         'CartePro',
         
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
