<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('serverid');
            $table->string('http')->nullable();
            $table->string('ftp')->nullable();
            $table->string('smtp')->nullable();
            $table->string('imap')->nullable();
            $table->mediumText('notes')->nullable();
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
        Schema::dropIfExists('server_configurations');
    }
}
