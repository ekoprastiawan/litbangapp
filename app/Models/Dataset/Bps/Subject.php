<?php

namespace App\Models\Dataset\Bps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $primaryKey = 'sub_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'sub_id',
        'title',
        'subcat_id'
    ];

}
