<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoAuthToGsbuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gsbuser', function (Blueprint $table) {
            $table->string('gsbuser_type_auth')->nullable()->default('AD');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gsbuser', function (Blueprint $table) {
            $table->dropColumn(['gsbuser_type_auth']);
        });
    }
}
