<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentGrade extends Model
{
    use HasFactory;

    public const ONE = 1;
    public const TWO = 2;
    public const THREE = 3;
    public const FOUR = 4;
    public const FIVE = 5;

    public const VALID_GRADES = [
        self::ONE,
        self::TWO,
        self::THREE,
        self::FOUR,
        self::FIVE,
    ];

    protected $fillable = [
        'grade',
        'description',
    ];
}
