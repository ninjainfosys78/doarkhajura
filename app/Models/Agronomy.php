<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agronomy extends Model
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
        'quotes',
        'quotes_en',
        'description',
        'description_en',
        'photo',
        'research_unit_id',
        'scientist_id',
        'technical_officer_id'
    ];
    public function getPhotoAttribute($value): string
    {
        return asset('storage/' . $value);
    }

    public function setPhotoAttribute($value)
    {
        $this->attributes['photo'] = $value->store('Agronomy', 'public');
    }
    public function researchUnit(): BelongsTo
    {
        return $this->belongsTo(ResearchUnit::class);
    }
    public function Scientist(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'scientist_id');
    }
    public function TechnicalOfficer(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'technical_officer_id');
    }
}
