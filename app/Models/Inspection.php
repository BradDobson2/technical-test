<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspector_name',
        'inspection_date',
    ];

    public function turbine(): BelongsTo
    {
        return $this->belongsTo(Turbine::class);
    }

    public function inspectionComponents(): HasMany
    {
        return $this->hasMany(InspectionComponent::class);
    }
}
