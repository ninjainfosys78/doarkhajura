<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoGallery extends Model
{
    use HasFactory,SoftDeletes;

    protected  $fillable = ['title','title_en','slug','research_unit_id'];

    protected $dates = ['created_at','updated_at','deleted_at'];

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }
    public function researchUnit(): BelongsTo
    {
        return $this->belongsTo(ResearchUnit::class);
    }


}
