<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryFilter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
/*        Schema::table('category_filter', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('filter_id');
            $table->foreign('filter_id')->references('id')->on('filters');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_filter', function (Blueprint $table) {
            //
        });
    }
}
