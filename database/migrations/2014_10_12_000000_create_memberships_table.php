<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->bigIncrements('id', 10);
            $table->string('name', 191);
            $table->string('details', 191);
            $table->int('ad_limit', 11);
            $table->decimal('price', 10,4);
            $table->int('duration', 10);
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
