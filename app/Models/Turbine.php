<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

class Turbine extends Model
{
    use HasFactory;
    use HasSpatial;

    protected $fillable = [
        'name',
        'location',
    ];

    protected $casts = [
        'location' => Point::class,
    ];

    public function windFarm(): BelongsTo
    {
        return $this->belongsTo(WindFarm::class);
    }

    public function components(): HasMany
    {
        return $this->hasMany(Component::class);
    }

    public function inspections(): HasMany
    {
        return $this->hasMany(Inspection::class);
    }
}
