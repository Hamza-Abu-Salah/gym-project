<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('phone');
            $table->string('seo_text');
            $table->string('hero_text');
            $table->string('email');
            $table->string('location');
            $table->string('hero_image');
            $table->string('copyright');
            $table->string('footer_text');
            $table->string('hero_btn_text');
            $table->string('hero_btn_link');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('tiktok');
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
        Schema::dropIfExists('settings');
    }
};
