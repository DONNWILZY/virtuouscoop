<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellcards', function (Blueprint $table) {
            $table->bigIncrements('id', 10);
            $table->int('user_id', 55);
            $table->string('name', 33);
            $table->string('value', 33);
            $table->int('status', 11);
            $table->string('back', 330);
            $table->string('front', 330);
            $table->timestamps();
            $table->strin('created_at');
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
        Schema::dropIfExists('failed_jobs');
    }
}
