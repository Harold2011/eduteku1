<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bootcamp_sponsor extends Model
{
    use HasFactory;

    protected $table = 'bootcamp_sponsor';
    protected $fillable = ['id_bootcamp', 'id_sponsor'];
}
