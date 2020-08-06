<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id', 10);
            $table->int('user_id', 10);
            $table->string('avatar', 191);
            $table->float('main_balance', 15,2);
            $table->decimal('deposit_balance', 15,2);
            $table->int('savings_balance', 60);
            $table->decimal('referral_balance', 15,4);
            $table->int('contribution_balance', 200);
            $table->string('occupation', 191);
            $table->string('mobile', 191);
            $table->string('address', 191);
            $table->string('address2', 191);
            $table->string('city', 191);
            $table->string('state', 191);
            $table->string('postcode', 191 );
            $table->string('country', 191);
            $table->text('about',);
            $table->string('facebook', 191);
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
