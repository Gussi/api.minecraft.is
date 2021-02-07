<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerStatusPlugin extends Model
{
    use HasFactory;

    protected $table = 'server_status_plugin';

    protected $fillable = [
        'name',
    ];

    public function serverStatus()
    {
        return $this->belongsTo(ServerStatus::class);
    }
}
