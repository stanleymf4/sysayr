<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsbuser', function (Blueprint $table) {
            $table->bigIncrements('gsbuser_id');
            $table->string('gsbuser_login', 50);
            $table->string('gsbuser_password', 100);
            $table->string('gsbuser_name', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gsbuser');
    }
}
