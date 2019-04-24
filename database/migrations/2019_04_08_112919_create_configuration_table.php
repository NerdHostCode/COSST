<?php

use App\Configuration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuration', function (Blueprint $table) {
            $table->string('setting')->unique();
            $table->text('value');
            $table->timestamps();
        });

        $this->populate('RegistrationEnabled', '1');
        $this->populate('SystemURL', 'http://localhost/');
        $this->populate('CompanyName', env('app.name', 'COSST'));
    }

    private function populate(string $setting, string $value) {
        $config = new Configuration();
        $config->setting = $setting;
        $config->value = $value;
        $config->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuration');
    }
}
