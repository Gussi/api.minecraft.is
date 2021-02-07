<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $table = 'server';

    protected $fillable = [
        'host',
        'host_server',
        'host_query',
    ];

    public function serverStatus()
    {
        return $this->hasMany(ServerStatus::class);
    }
}
