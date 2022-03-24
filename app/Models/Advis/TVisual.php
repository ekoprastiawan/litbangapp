<?php

namespace App\Models\Advis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TVisual extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'judul',
        'label',
        'file_url',
        'ref_jenis_visual_id',
        'pilih_visual',
        'updated_by'
    ];

    /**
     * Relasi dari RefJenisVisual.
     */
    public function refJenisVisual()
    {
        return $this->belongsTo(RefJenisVisual::class,'ref_jenis_visual_id','id');
    }
}
