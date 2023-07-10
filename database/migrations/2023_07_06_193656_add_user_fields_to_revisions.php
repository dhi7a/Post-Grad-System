<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('revisions', function (Blueprint $table) {
            $table->string('user_name')->nullable();
            $table->string('user_role')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('revisions', function (Blueprint $table) {
        $table->dropColumn('user_name');
        $table->dropColumn('user_role');
    });
}

};
