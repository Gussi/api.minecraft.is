<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_status', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('server_id')
                ->comment('Reference to server table');
            $table->dateTime('date')
                ->comment('Query date');
            $table->string('hostname')
                ->comment('Hostname from query info');
            $table->string('gametype')
                ->comment('Gametype from query info');
            $table->string('version')
                ->comment('Version from query info');
            $table->string('map')
                ->comment('Map from query info');
            $table->unsignedSmallInteger('players_current')
                ->comment('Players online');
            $table->unsignedSmallInteger('players_max')
                ->comment('Max players');
            $table->string('ip')
                ->comment('Host IP from query info');
            $table->string('software')
                ->comment('Server software from query info');

            $table->softDeletes();
            $table->timestamps();

            $table->index('server_id');
            $table->index('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_status');
    }
}
