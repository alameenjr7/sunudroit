<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publication_id');
            $table->tinyInteger('rate')->default(0);
            $table->string('full_name');
            $table->string('email');
            $table->text('review');
            $table->enum('status',['active','inactive'])->default('active');

            $table->foreign('publication_id')->references('id')->on('publications')->onDelete('CASCADE');
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
        Schema::dropIfExists('publication_reviews');
    }
}
