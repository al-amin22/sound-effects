<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeywordAnalysis extends Model
{
    protected $table = 'keyword_analysis';

    protected $fillable = [
        'sound_effect_id',
        'keyword',
        'count',
        'positions'
    ];

    protected $casts = [
        'positions' => 'array'
    ];

    public function soundEffect()
    {
        return $this->belongsTo(SoundEffect::class);
    }
}
