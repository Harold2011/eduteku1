<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class challenge_filter_category extends Model
{
    use HasFactory;

    protected $table = 'challenge_filter_category';
    protected $fillable = ['name'];

    public function bootcamps()
    {
        return $this->hasMany(bootcamps::class, 'id_challenge_filter_category');
    }
}
