<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSdcPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdc_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_vi');
            $table->string('title_en');
            $table->string('description_vi');
            $table->string('description_en');
            $table->text('content_vi');
            $table->text('content_en');
            $table->string('slug_vi');
            $table->string('slug_en');
            $table->integer('views')->default(0);
            $table->integer('favorite')->default(0);
            $table->tinyInteger('publish')->default(0);
            $table->integer('sdc_category_id');
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
        Schema::drop('sdc_posts');
    }
}
