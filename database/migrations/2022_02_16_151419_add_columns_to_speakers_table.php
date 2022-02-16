<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('speakers', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
            $table->string('mobile')->after('image')->unique();
            $table->text('bio')->nullable()->after('image');
            $table->string('position')->nullable()->after('image');
            $table->unsignedBigInteger('user_id')->after('title_ar');
            $table->unsignedBigInteger('country_id')->nullable()->after('title_ar');
            $table->unsignedBigInteger('city_id')->nullable()->after('title_ar');

            $table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
            $table->foreign('city_id')->references('id')->on('cities')->nullOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('speakers', function (Blueprint $table) {
            $table->dropColumn([
                'mobile',
                'bio',
                'position',
                'country_id',
                'city_id',
                'user_id',
            ]);
        });
    }
}
