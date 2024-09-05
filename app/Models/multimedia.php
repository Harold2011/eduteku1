<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class Multimedia extends Model
{
    use HasFactory;

    protected $table = 'multimedia';
    protected $fillable = ['name', 'descripcion', 'url', 'user_id', 'status_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
