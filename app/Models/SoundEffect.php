<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public function pack()
    {
        return $this->belongsTo(SoundPack::class, 'pack_id');
    }
    // app/Models/SoundPack.php
    public function getSeoTitle()
    {
        return $this->seo_title ?? "{$this->name} Sound Pack | Download Free SFX";
    }

    public function getSeoDescription()
    {
        return $this->seo_description ?? Str::limit(strip_tags($this->description), 160) ??
            "Download {$this->name} sound pack with {$this->sounds->count()} high-quality sound effects for your projects.";
    }

    public function getSeoKeywords()
    {
        if ($this->seo_keywords) {
            return $this->seo_keywords;
        }

        $defaultKeywords = [
            strtolower($this->name) . ' sound pack',
            'free sound effects',
            'download sfx',
            strtolower($this->category->name) . ' sounds'
        ];

        return implode(', ', array_unique($defaultKeywords));
    }
}
