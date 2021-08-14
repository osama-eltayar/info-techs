<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('title');
            $table->string('nationality');
            $table->string('job')->nullable();
            $table->string('mobile');
            $table->string('saudi_council')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('speciality_id')->index();
            $table->unsignedBigInteger('country_id')->index();
            $table->unsignedBigInteger('city_id')->index();
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
        Schema::dropIfExists('profiles');
    }
}
