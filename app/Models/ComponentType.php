<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentType extends Model
{
    use HasFactory;

    public const BLADE = 'Blade';
    public const ROTOR = 'Rotor';
    public const HUB = 'Hub';
    public const GENERATOR = 'Generator';

    public const VALID_TYPES = [
        self::BLADE,
        self::ROTOR,
        self::HUB,
        self::GENERATOR,
    ];

    protected $fillable = [
        'type',
    ];

    public function scopeBlade(Builder $query): void
    {
        $query->where('type', self::BLADE);
    }

    public function scopeRotor(Builder $query): void
    {
        $query->where('type', self::ROTOR);
    }

    public function scopeHub(Builder $query): void
    {
        $query->where('type', self::HUB);
    }

    public function scopeGenerator(Builder $query): void
    {
        $query->where('type', self::GENERATOR);
    }
}
