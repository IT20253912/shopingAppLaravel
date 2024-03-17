<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('catagories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('catagories')->onDelete('cascade');
            $table->string('catagory_name')->unique();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('catagories');
    }
};

