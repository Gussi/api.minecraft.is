<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerStatusPlayer extends Model
{
    use HasFactory;

    protected $table = 'server_status_player';

    protected $fillable = [
        'name',
    ];
}
