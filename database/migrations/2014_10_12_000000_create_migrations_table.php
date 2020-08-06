<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateMigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('migrations', function (Blueprint $table) {
            $table->bigIncrements('id', 10);
            $table->string('migration', 191); 
            $table->int('batch', 11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buycards');
    }
}
