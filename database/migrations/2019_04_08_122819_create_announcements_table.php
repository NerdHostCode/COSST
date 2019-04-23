<?php

use App\Announcement;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->longText('article');
            $table->bigInteger('category');
            $table->string('hidden', 1)->default(0);
            $table->timestamps();
        });

        $this->populate([
            'title' => 'Welcome to COSST!',
            'article' => htmlentities('COSST stands for Completely Open Source Support Ticketing '
            . 'and is provided open-source, completely free of charge!<br><br>For help '
            . 'getting started, check out our <a href="https://docs.cosst.co.uk/" '
            . 'target="_blank">Documentation</a>.</p>'),
            'category' => 1,
        ]);
    }

    private function populate(array $data) {
        $announcement = new Announcement();
        foreach ($data as $key => $value) {
            $announcement->$key = $value;
        }
        $announcement->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
