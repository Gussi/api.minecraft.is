<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return collect([
            'id',
            'host',
            'port_server',
            'port_query',
        ])->mapWithKeys(fn (string $key) => [$key => $this->$key]);
    }
}
