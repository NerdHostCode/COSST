<?php

use App\Configuration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
        $this->populate('SystemURL', env('APP_URL', 'http://localhost/'));
        $this->populate('CompanyName', env('APP_NAME', 'COSST'));
        $this->populate('KBAllowUnregistered', 1);
        $this->populate('ServerStatusAllowUnregistered', 1);
        $this->populate('AnnouncementsAllowUnregistered', 1);
    }

    private function populate(string $setting, string $value)
    {
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
