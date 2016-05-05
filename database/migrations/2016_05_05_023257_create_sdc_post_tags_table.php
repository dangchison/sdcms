<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSdcPostTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdc_post_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sdc_post_id');
            $table->integer('sdc_tag_id');
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
        Schema::drop('sdc_post_tags');
    }
}
