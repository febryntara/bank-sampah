<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gambar extends Model
{
    use HasFactory;

    protected $table = 'tb_gambar';
    protected $fillable = ['src', 'alt'];

    // custom attribute
    public function getPathAttribute()
    {
        return env('APP_URL') . 'storage/' . $this->src;
    }
    // local scope
    // relation
    public function sampah()
    {
        return $this->morphTo(Sampah::class, 'imageable');
    }
    // event
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
        });

        self::created(function ($model) {
        });

        self::updating(function ($model) {
        });

        self::updated(function ($model) {
        });

        self::deleting(function ($model) {
            Storage::delete($model->src);
        });

        self::deleted(function ($model) {
        });
    }
}
