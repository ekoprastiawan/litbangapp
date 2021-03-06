<?php

namespace App\Models\Advis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKategori extends Model
{
    use HasFactory;
    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama_kategori'
    ];

    /**
     * Relasi ke RefSubKategori.
     */
    public function refSubKategori()
    {
        return $this->hasMany(RefSubKategori::class);
    }
}
