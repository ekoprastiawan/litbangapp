<?php

namespace App\Models\Dataset\Bps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $primaryKey = 'th_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'th_id',
        'th'
    ];
}
