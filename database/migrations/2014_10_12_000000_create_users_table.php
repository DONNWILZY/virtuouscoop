<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->string('account', 66);
            $table->tinyint('admin', 1);
            $table->string('email', 191);
            $table->string('username', 191);
            $table->string('password', 191);
            $table->int('membership_id', 10);
            $table->date('membership_started');
            $table->date('membership_expired');
            $table->string('token', 191);
            $table->string('d_code', 191);
            $table->datetime('bonus');
            $table->tinyint('active', 1);
            $table->int('verified', 1);
            $table->tinyint('ban', 1);
            $table->string('note', 191);
            $table->string('remember_token', 100);
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
