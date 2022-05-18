<?php

namespace App\Models\Advis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LogSession extends Model
{
    use HasFactory;
    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'user_id',
        'ip_address',
        'user_agent',
        'new_activity',
        'old_activity',
        'total_activity'
    ];

    /**
     * Relasi dari User.
     */
    public function userLog()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
