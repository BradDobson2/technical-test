<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InspectionComponent extends Model
{
    use HasFactory;

    protected $table = 'inspection_components';

    protected $fillable = [
        'image_url',
    ];

    public function inspection(): BelongsTo
    {
        return $this->belongsTo(Inspection::class);
    }

    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class);
    }

    public function componentGrade(): BelongsTo
    {
        return $this->belongsTo(ComponentGrade::class);
    }
}
