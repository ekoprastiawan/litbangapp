<?php

namespace App\Models\Dataset\Bps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DerivedPeriod extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $primaryKey = 'turth_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'turth_id',
        'turth',
        'group_turth_id',
        'name_group_turth'
    ];
}
