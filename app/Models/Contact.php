<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'sujet',
        'message',
    ];

    public function replies()
{
    return $this->hasMany(ContactReply::class);
}

    
}
