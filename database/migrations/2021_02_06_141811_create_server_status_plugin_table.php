<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerStatusPluginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_status_plugin', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('server_status_id')
                ->comment('Reference to server_status table');
            $table->string('name')
                ->comment('Plugin name');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_status_plugin');
    }
}
