<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoPratiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_pratiques', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->mediumText('description');
            $table->enum('icons',[
                'flaticon-car-1',
                'flaticon-briefcase',
                'flaticon-handcuffs-1',
                'flaticon-save-money',
                'flaticon-injury',
                'flaticon-law',
                'flaticon-balance',
                'flaticon-notebook',
                'flaticon-auction',
                'flaticon-marketing'
                ])->default('flaticon-injury')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
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
        Schema::dropIfExists('info_pratiques');
    }
}
