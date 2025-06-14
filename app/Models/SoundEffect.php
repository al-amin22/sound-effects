<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoundEffect extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'file_path', 'category_id', 'keywords'];
    protected $table = 'sound_effects';
    protected $primaryKey = 'id';
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
