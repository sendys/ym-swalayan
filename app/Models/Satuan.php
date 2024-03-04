<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Satuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'satuan',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });

        self::updating(function ($model) {
            $model->uuid = $model->getOriginal('uuid');
        });
    }
}
