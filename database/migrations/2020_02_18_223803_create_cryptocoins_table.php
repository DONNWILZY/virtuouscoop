<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptocoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cryptocoins', function (Blueprint $table) {
            $table->bigIncrements('id', 11);
            $table->string('name', 44);
            $table->int('price', 44);
            $table->string('sell', 22);
            $table->int('available', 44);
            $table->text('details', 44);
            $table->timestamps();
            $table->timestamps('created_at', 55);
            $table->timestamps('updated_at', 55);
            $table->int('status', 55);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
