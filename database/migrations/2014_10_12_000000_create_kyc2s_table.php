<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateKyc2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kyc2s', function (Blueprint $table) {
            $table->bigIncrements('id', 10);
            $table->int('user_id', 10);
            $table->string('name', 191);
            $table->string('photo', 191);
            $table->tinyint('status');
            $table->timestamp();
            $table->int('created_at');
            $table->int('updated_at');


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
