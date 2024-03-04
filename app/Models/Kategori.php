<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'kode',
        'kategori',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->kode = self::generateUniqueCode();
        });

        self::updating(function ($model) {
            $model->uuid = $model->getOriginal('uuid');
            $model->kode = $model->getOriginal('kode');
        });
    }

    protected static function generateUniqueCode()
    {
        return 'KT' . date('YmdHis') . rand(1000, 9999);
    }
}
