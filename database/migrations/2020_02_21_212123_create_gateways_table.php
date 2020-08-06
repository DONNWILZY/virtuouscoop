<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateways', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('name', 191);
            $table->string('image',191);
            $table->string('account', 191);
            $table->decimal('fixed', 10,2);
            $table->tinyint('mode', 4);
            $table->string('val1', 191);
            $table->string('val2', 191);
            $table->string('val3', 191);
            $table->text('details');
            $table->tinyint('status');
            $table->timestamps();
            $table->string('created_at');
            $table->string('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
