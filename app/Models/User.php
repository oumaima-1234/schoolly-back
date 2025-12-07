<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Les champs qui peuvent être assignés en masse
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Les champs à cacher dans les réponses JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relation avec Etudiant
     */
    public function etudiant()
    {
        return $this->hasOne(Etudiant::class);
    }

    /**
     * Relation avec Professeur
     */
    public function professeur()
    {
        return $this->hasOne(Professeur::class);
    }

    /**
     * Relation avec Directeur
     */
    public function directeur()
    {
        return $this->hasOne(Directeur::class);
    }
}
