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
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userid');
            $table->string('programme');
            $table->enum('status', ['full-time', 'part-time']);
            $table->string('title');
            $table->string('surname');
            $table->string('forenames');
            $table->string('marital_status');
            $table->string('nationality');
            $table->string('national_id');
            $table->string('permanent_residence');
            $table->string('passport_no');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->text('disabilities')->nullable();
            $table->text('contact_address');
            $table->string('home_phone')->nullable();
            $table->string('contact_number');
            $table->string('email');
            $table->string('fax')->nullable();
            $table->string('prospective_sponsors')->nullable();
            $table->boolean('msu_staff_dependant')->default(false);
            $table->boolean('msu_staff_member')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
