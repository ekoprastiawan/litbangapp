<?php

namespace App\Models\Advis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TAnalytic extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'judul',
        'uraian',
        'img_url',
        'file_url',
        'dashboard_url',
        'created_by',
        'updated_by'
    ];
}
