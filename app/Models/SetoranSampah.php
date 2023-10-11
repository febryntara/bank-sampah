<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetoranSampah extends Model
{
    use HasFactory;
    protected $table = 'tb_setoran_sampah';
    protected $fillable = ['nama', 'jumlah', 'hasil', 'sampah_id'];

    // custom attribute
    public function getJenisSampahAttribute()
    {
        return $this->sampah->nama;
    }
    // local scope
    public function scopeSearch($query, $keyword)
    {
        $query->when($keyword ?? false, function ($query) use ($keyword) {
            $query->whereHas('sampah', function ($query) use ($keyword) {
                $query->where('nama', 'like', "%$keyword%");
            });
        });
    }
    // relation
    public function sampah()
    {
        return $this->belongsTo(Sampah::class, 'sampah_id');
    }
    // event
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->hasil = $model->jumlah * $model->sampah->harga_kg;
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
        });
    }
}
