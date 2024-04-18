<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['choice_id', 'user_id'];

    public function choice(): BelongsTo
    {
        return $this->belongsTo(Choice::class);
    }
}
