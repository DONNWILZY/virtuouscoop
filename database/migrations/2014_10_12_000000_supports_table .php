<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('');
            $table->int('user_id', 10);
            $table->string('subject', 191);
            $table->text('message');
            $table->tinyint('status');
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
