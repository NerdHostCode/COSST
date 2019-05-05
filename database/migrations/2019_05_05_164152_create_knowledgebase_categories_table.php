<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgebaseCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledgebase_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent')->default('0');
            $table->text('name');
            $table->text('description');
            $table->enum('hidden', ['0', '1'])->default('0');
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
        Schema::dropIfExists('knowledgebase_categories');
    }
}
