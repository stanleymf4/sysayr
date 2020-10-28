<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsbenur', function (Blueprint $table) {
            $table->bigIncrements('gsbenur_id');
            $table->unsignedInteger('gsbenur_dven_id')->comment('identificador de entidad de visibilidad de datos');
            $table->foreign('gsbenur_dven_id', 'fk_gsbenur_gtvdven')->references('gtvdven_id')->on('gtvdven')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('gsbenur_user_id')->comment('identificador de de usuario');
            $table->foreign('gsbenur_user_id', 'fk_gsbenur_gsbuser')->references('gsbuser_id')->on('gsbuser')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('gsbenur');
    }
}
