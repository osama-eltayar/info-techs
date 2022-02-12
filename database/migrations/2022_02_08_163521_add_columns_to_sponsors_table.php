<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sponsors', function (Blueprint $table) {
            $table->string('logo')->nullable()->change();
            $table->string('email')->after('logo')->unique();
            $table->string('mobile')->after('logo')->unique();
            $table->text('description_ar')->nullable()->change();
            $table->text('description_en')->nullable()->change();
            $table->unsignedBigInteger('country_id')->after('logo');
            $table->unsignedBigInteger('city_id')->after('logo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sponsors', function (Blueprint $table) {
            $table->dropColumn([
                'email',
                'mobile',
                'country_id',
                'city_id',
            ]);

            $table->text('description_ar')->change();
            $table->text('description_en')->change();
            $table->string('logo')->change();
        });
    }
}
