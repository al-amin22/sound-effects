<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description'];
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // Relasi jika kamu punya SoundEffect model
    public function soundEffects()
    {
        return $this->hasMany(SoundEffect::class);
    }

    public function soundPacks()
    {
        return $this->hasMany(SoundPack::class);
    }
}
