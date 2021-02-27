<?php

namespace App\Http\Resources;

use App\Http\Resources\ServerStatusPlayerResource;
use App\Http\Resources\ServerStatusPluginResource;

use Illuminate\Http\Resources\Json\JsonResource;

class ServerStatusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'hostname'          => $this->hostname,
            'gametype'          => $this->gametype,
            'version'           => $this->version,
            'map'               => $this->map,
            'players_current'   => $this->players_current,
            'players_max'       => $this->players_max,
            'ip'                => $this->ip,
            'software'          => $this->software,
            'server_id'         => $this->server_id,
            'date'              => $this->created_at,
            'players'           => ServerStatusPlayerResource::collection($this->serverStatusPlayer()->get()),
            'plugins'           => ServerStatusPluginResource::collection($this->serverStatusPlugin()->get()),
        ];
    }
}
