<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoundPack extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'category_id',
        'country'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function sounds()
    {
        return $this->hasMany(SoundEffect::class, 'pack_id');
    }
}
