<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsbmenu', function (Blueprint $table) {
            $table->bigIncrements('gsbmenu_id')->comment('Identificador de menu');
            $table->unsignedInteger('gsbmenu_parent_id')->default(0)->comment('identificador de menu padre');
            $table->string('gsbmenu_name', 50);
            $table->string('gsbmenu_url', 100);
            $table->unsignedInteger('gsbmenu_order')->default(0);
            $table->string('gsbmenu_icon', 50)->nullable();
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
        Schema::dropIfExists('gsbmenu');
    }
}
