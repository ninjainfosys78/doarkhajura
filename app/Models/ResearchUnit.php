<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchUnit extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates=[
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable=[

        'research_unit_id',
        'research_unit_name',
        'research_unit_name_en',
    ];


    public function scopeMainResearchUnit($query)
    {
        return $query->whereNull('research_unit_id');
    }

    public function ScopeSubResearchUnit($query)
    {
        return $query->whereNotNull('research_unit_id');
    }
    public function scopeFilterData($query, $params = [])
    {
        if (!empty($params['research_unit_id'])) {
            if (is_array($params['research_unit_id'])) {
                $query->whereIn('research_unit_id', $params['research_unit_id']);
            } else {
                $query->where('research_unit_id', $params['research_unit_id']);
            }
        }

        return $query;
    }

    public function researchUnit(): BelongsTo
    {
        return $this->belongsTo(__CLASS__);
    }

    public function researchUnits(): HasMany
    {
        return $this->hasMany(__CLASS__);
    }
    public function photoGallery(): HasMany
    {
        return $this->hasMany(PhotoGallery::class);
    }
    public function videoGallery(): HasMany
    {
        return $this->hasMany(VideoGallery::class);
    }
    public function Document(): HasMany
    {
        return $this->hasMany(Document::class);
    }
    public function farmerHelpfull(): HasMany
    {
        return $this->hasMany(FarmerHelpfull::class);
    }
    public function Agronomy(): HasMany
    {
        return $this->hasMany(Agronomy::class);
    }

}
