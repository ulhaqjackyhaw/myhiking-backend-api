<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gunung extends Model
{
    use HasFactory;

    protected $table = 'gunung';

    protected $fillable = [
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'nama',
        'deskripsi',
        'ketinggian',
        'gambar'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }
}
