<?php

namespace App\Models\Dataset\Bps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DerivedVariable extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $primaryKey = 'turvar_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'turvar_id',
        'turvar',
        'group_turvar_id',
        'name_group_turvar'
    ];
}
