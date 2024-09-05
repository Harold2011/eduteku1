<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sponsor extends Model
{
    use HasFactory;

    protected $table = 'sponsor';
    protected $fillable = ['name', 'img_url'];

    public function bootcamps()
    {
        return $this->belongsToMany(Bootcamp::class, 'bootcamp_sponsor', 'id_sponsor', 'id_bootcamp');
    }

}
