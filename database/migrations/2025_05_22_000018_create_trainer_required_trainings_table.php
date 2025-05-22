<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trainer_required_trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_need_advertisement_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('trainer_assistant_advertisement_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainer_required_trainings');
    }
}; 