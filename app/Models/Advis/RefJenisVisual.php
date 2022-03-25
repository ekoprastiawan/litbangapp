<?php

namespace App\Models\Advis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefJenisVisual extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama_jenis_visual',
        'tipe'
    ];

    /**
     * Relasi ke TVisual.
     */
    public function tVisual()
    {
        return $this->hasMany(TVisual::class);
    }
}
