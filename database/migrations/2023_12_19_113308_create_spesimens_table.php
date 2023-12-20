<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpesimensTable extends Migration
{
    public function up()
    {
        Schema::create('spesimens', function (Blueprint $table) {
            $table->id();
            $table->datetime('datetime');
            $table->string('origin');
            $table->string('courier_name');
            $table->string('expedition');
            $table->string('pic_name');
            $table->string('pic_phone');
            $table->string('specimen_type');
            $table->integer('specimen_quantity');
            $table->string('specimen_temperature');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spesimens');
    }
}
