<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'supplier',
        'telp',
        'email',
        'alamat',
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
