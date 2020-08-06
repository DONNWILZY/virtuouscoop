<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191);
            $table->string('details', 191);
            $table->string('link', 191);
            $table->int('membership_id', 10);
            $table->tinyint('status', 1);
            $table->decimal('rewards', 10,4);
            $table->int('user_id', 10);
            $table->int('order_id', 11);
            $table->tinyint('type', 3);
            $table->timestamp();
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
        Schema::dropIfExists('buycards');
    }
}
