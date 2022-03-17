<?php

namespace App\Models\Advis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TListData extends Model
{
    use HasFactory;
    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_kategori',
        'id_sub_kategori',
        'id_sumber_data',
        'nama_data',
        'url_data',
        'created_by',
        'updated_by'
    ];
}
