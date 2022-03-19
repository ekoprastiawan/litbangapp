<?php

namespace App\Models\Advis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TListData extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $table = 't_list_data';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'ref_sub_kategori_id',
        'ref_sumber_data_id',
        'nama_data',
        'url_data',
        'created_by',
        'updated_by'
    ];

    /**
     * Relasi dari RefSubKategori.
     */
    public function refSubKategori()
    {
        return $this->belongsTo(RefSubKategori::class,'ref_sub_kategori_id','id');
    }

    /**
     * Relasi dari RefSumberData.
     */
    public function refSumberData()
    {
        return $this->belongsTo(RefSumberData::class,'ref_sumber_data_id','id');
    }
}
