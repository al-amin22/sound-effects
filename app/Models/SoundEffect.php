<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoundEffect extends Model
{
    protected $fillable = [
        'title',
        'description',
        'keywords',
        'slug',
        'article',
        'audio_path',
        'image_path',
        'country',
        'category_id',
        'duration'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function seoEvaluation()
    {
        return $this->hasOne(SeoEvaluation::class, 'sound_effect_id');
    }

    public function keywordAnalysis()
    {
        return $this->hasMany(KeywordAnalysis::class, 'sound_effect_id');
    }
}
