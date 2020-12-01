<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLdapColumnsToGsbuserTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('gsbuser', function (Blueprint $table) {
            $table->string('guid')->unique()->nullable();
            $table->string('domain')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('gsbuser', function (Blueprint $table) {
            $table->dropColumn(['guid', 'domain']);
        });
    }
}
