<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoEvaluation extends Model
{
    protected $fillable = [
        'sound_effect_id',
        'word_count',
        'keyword_density',
        'readability_score',
        'heading_structure',
        'meta_title_length',
        'meta_description_length',
        'internal_links_count',
        'external_links_count',
        'seo_score'
    ];

    protected $casts = [
        'keyword_density' => 'array',
        'heading_structure' => 'array'
    ];

    public function soundEffect()
    {
        return $this->belongsTo(SoundEffect::class);
    }
}
