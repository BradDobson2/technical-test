<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

class WindFarm extends Model
{
    use HasFactory;
    use HasSpatial;

    protected $fillable = [
        'name',
        'area',
    ];

    protected $casts = [
        'area' => Polygon::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function turbines(): HasMany
    {
        return $this->hasMany(Turbine::class);
    }
}
