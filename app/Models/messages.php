<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    protected $table = 'messages';
    protected $fillable = ['meil', 'message', 'date'];
}
