<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateThriftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thrifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 77);
            $table->int('members', 33);
            $table->float('amount', 10,2);
            $table->int('numbers', 200);
            $table->int('status', 1);
            $table->int('cycle', 100);
            $table->string('cyclename', 400);
            $table->timestamps();
            $table->string('created_at', 44); 
            $table->string('updated_at', 44); 
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
