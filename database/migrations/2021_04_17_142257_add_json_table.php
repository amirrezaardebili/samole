<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJsonTable extends Migration
{
    public function up()
    {
        Schema::create('user_attributes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->longText('attributes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_attributes');
    }
}
