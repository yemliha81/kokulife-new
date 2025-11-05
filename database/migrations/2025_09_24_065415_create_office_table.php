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
        Schema::create('office', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('office_id');
            $table->string('lang', 10);
            $table->string('title', 100);
            $table->text('description');
            $table->string('address', 255);
            $table->string('phone', 50);
            $table->string('email', 100);
            $table->string('lat', 50);
            $table->string('long', 50);
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
        Schema::dropIfExists('office');
    }
};
