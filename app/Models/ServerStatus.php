<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerStatus extends Model
{
    use HasFactory;

    protected $table = 'server_status';

    protected $fillable = [
        'hostname',
        'gametype',
        'version',
        'map',
        'players_current',
        'players_max',
        'ip',
        'software',
    ];

    protected $casts = [
        'date'      => 'datetime',
    ];
}
