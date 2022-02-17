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
            $table->dropColumn('title_ar');
            $table->dropColumn('title_en');

            $table->string('image')->nullable()->change();
            $table->string('email')->after('image')->unique();
            $table->string('mobile')->after('image')->unique();
            $table->text('bio')->nullable()->after('image');
            $table->string('position')->nullable()->after('image');
            $table->unsignedBigInteger('user_title_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();

            $table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
            $table->foreign('city_id')->references('id')->on('cities')->nullOnDelete();
            $table->foreign('user_title_id')->references('id')->on('user_titles')->nullOnDelete();
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
            $table->string('title_en');
            $table->string('title_ar');
            $table->dropColumn([
                'email',
                'mobile',
                'bio',
                'position',
            ]);
            $table->dropForeign([
                'country_id',
                'city_id',
                'user_title_id',
            ]);
        });
    }
}
