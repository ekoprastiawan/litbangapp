<?php

namespace App\Models\Advis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefSubKategori extends Model
{
    use HasFactory;
    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama_sub_kategori',
        'ref_kategori_id'
    ];

    /**
     * Relasi dari RefKategori.
     */
    public function refKategori()
    {
        return $this->belongsTo(RefKategori::class);
    }

    /**
     * Relasi ke TListData.
     */
    public function tListData()
    {
        return $this->hasMany(TListData::class);
    }
}
