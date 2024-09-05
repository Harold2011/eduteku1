<?php
// app/Models/Like.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\multimedia;

class Like extends Model
{
    use HasFactory;

    protected $table = 'like'; // Especificar el nombre de la tabla

    protected $fillable = ['user_id', 'multimedia_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function multimedia()
    {
        return $this->belongsTo(Multimedia::class);
    }
}
