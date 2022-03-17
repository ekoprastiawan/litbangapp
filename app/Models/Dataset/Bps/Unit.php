<?php

namespace App\Models\Dataset\Bps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $primaryKey = 'unit_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'unit_id',
        'unit'
    ];
}
