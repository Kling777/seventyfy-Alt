<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    use HasFactory;

    public function countries(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    protected $fillable = [
        'name',
        'bio',
        'country_id',
    ];
}
