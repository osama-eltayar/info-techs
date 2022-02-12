<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->string('material')->nullable()->after('logo');
            $table->unsignedBigInteger('user_id')->after('name_ar');
            $table->unsignedBigInteger('country_id')->after('name_ar');
            $table->unsignedBigInteger('city_id')->after('name_ar');
            $table->string('mobile')->after('name_ar');
            $table->string('logo')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropColumn([
                "material",
                "mobile",
                "country_id",
                "city_id",
                "user_id",
            ]);
        });
    }
}
