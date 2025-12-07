<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'subject', 'teacher', 'grade'];

    public function student()
    {
        return $this->belongsTo(Etudiant::class, 'student_id');
    }
}
