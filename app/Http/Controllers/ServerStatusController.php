<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\ServerStatus;
use App\Http\Resources\ServerStatusResource;

use Illuminate\Http\Request;

class ServerStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Server $server)
    {
        return ServerStatusResource::collection($server->serverStatus()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServerStatus  $serverStatus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Server $server, ServerStatus $status)
    {
        return ServerStatusResource::make($server->serverStatus()->findOrFail($status['id']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServerStatus  $serverStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Server $server, ServerStatus $status)
    {
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServerStatus  $serverStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Server $server, ServerStatus $status)
    {
        abort(403);
    }
}
