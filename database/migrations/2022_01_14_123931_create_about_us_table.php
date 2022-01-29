<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->text('heading');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->integer('exp_years')->default(2);
            $table->integer('partner_affaire')->default(500);
            $table->integer('cas_done')->default(200);
            $table->integer('client_happy')->default(70);
            $table->string('award_win')->nullable();
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
        Schema::dropIfExists('about_us');
    }
}
