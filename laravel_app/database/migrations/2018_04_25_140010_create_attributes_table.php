<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });
        Schema::create('a_values', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->char('type',3);
            $table->timestamps();
        });
        Schema::create('attributes_values_pairs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes');
            $table->unsignedInteger('value_id');
            $table->foreign('value_id')->references('id')->on('a_values');
            $table->timestamps();
        });
        Schema::create('sets_ids', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
        Schema::create('attributes_values_pairs_sets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('attribute_pair_id');
            $table->foreign('attribute_pair_id')->references('id')->on('attributes_values_pairs');
            $table->unsignedInteger('set_id')->nullable();
            $table->foreign('set_id')->references('id')->on('sets_ids');
            $table->timestamps();
        });

        Schema::create('products_variants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedInteger('attribute_set_id');
            $table->foreign('attribute_set_id')->references('id')->on('sets_ids');
            $table->timestamps();
        });
        Schema::create('category_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedInteger('attribute_set_id');
            $table->foreign('attribute_set_id')->references('id')->on('attributes_values_pairs_sets');
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
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('a_values');
        Schema::dropIfExists('attributes_values_sets');
    }
}
