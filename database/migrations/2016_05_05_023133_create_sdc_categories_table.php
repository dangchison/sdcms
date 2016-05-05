<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSdcCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdc_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_vi',100);
            $table->string('name_en',100);
            $table->string('slug_vi');
            $table->string('slug_en');
            $table->tinyInteger('publish')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sdc_categories');
    }
}
