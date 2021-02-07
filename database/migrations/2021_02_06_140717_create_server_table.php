<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server', function (Blueprint $table) {
            $table->id();

            $table->string('host')
                ->comment('Server hostname or IP');
            $table->unsignedSmallInteger('port_server')
                ->default(25565)
                ->comment('Client port');
            $table->unsignedSmallInteger('port_query')
                ->default(25565)
                ->comment('Query port');

            $table->softDeletes();
            $table->timestamps();

            $table->unique(['host', 'port_server']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server');
    }
}
