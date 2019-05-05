<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgebaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledgebase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('article');
            $table->integer('views');
            $table->string('votes')->default('{"helpful":"0","unhelpful":"0"}');
            $table->integer('registered')->length('1')->default('0');
            $table->bigInteger('category')->default('0');
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
        Schema::dropIfExists('knowledgebase');
    }
}
