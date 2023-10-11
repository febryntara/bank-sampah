<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;
    protected $table = 'tb_sampah';
    protected $fillable = ['nama', 'deskripsi', 'harga_kg'];

    // custom attribute
    // local scope
    public function scopeSearch($query, $keyword)
    {
        $query->when($keyword ?? false, function ($query) use ($keyword) {
            $query->where('nama', 'like', "%$keyword%");
        });
    }
    // relation
    public function gambar()
    {
        return $this->morphOne(Gambar::class, 'imageable');
    }
    public function setoran()
    {
        return $this->hasMany(SetoranSampah::class, 'sampah_id');
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
        });

        self::deleted(function ($model) {
            $model->gambar->delete();
        });
    }
}
