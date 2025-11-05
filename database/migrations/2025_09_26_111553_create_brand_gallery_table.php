<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('brand_gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id');
            $table->integer('image_id');
            $table->string('lang', 10);
            $table->string('image', 255);
            $table->string('alt', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->integer('sort')->nullable();
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
        Schema::dropIfExists('brand_gallery');
    }
};
