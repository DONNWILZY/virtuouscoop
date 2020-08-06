<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReflinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reflinks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('user_id',10);
            $table->string('link', 191);
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
