<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->mediumText('contenu')->nullable();
            $table->foreignId('cat_id');
            $table->foreignId('child_cat_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('photo')->nullable();
            $table->enum('conditions', ['publier', 'is_featured'])->default('publier');
            $table->enum('status', ['active','inactive'])->default('active');
            $table->string('added_by')->nullable();

            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('CASCADE');
            $table->foreign('child_cat_id')->references('id')->on('categories')->onDelete('SET NULL');
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
        Schema::dropIfExists('publications');
    }
}
