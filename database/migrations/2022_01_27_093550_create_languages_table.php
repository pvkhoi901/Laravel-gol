<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('country')->nullable()->default("vn");
            $table->string('language_key')->nullable()->default("");
            $table->string('language_title')->nullable()->default("");
            $table->string('language_image')->nullable()->default("");
            $table->string('language_url')->nullable()->default("");
            $table->longText('description')->nullable()->default("");
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
        Schema::dropIfExists('languages');
    }
}
