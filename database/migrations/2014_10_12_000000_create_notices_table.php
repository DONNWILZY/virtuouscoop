<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateBuycardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buycards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('user_id', 10);
            $table->string('title', 191);
            $table->text('body');
            $table->tinyint('status', 1);
            $table->tinyint('priority', 4);
            $table->string('file', 191);
             
            $table->timestamps();
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
