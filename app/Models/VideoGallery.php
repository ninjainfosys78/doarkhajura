<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoGallery extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates=[
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable=[
          'title',
        'title_en',
          'url',
          'research_unit_id',
    ];
    public function researchUnit(): BelongsTo
    {
        return $this->belongsTo(ResearchUnit::class);
    }
}
