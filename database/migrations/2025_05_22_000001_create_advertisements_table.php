<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->enum('type', ['إعلان تدريب', 'إعلان مناقصة', 'إعلان استدراج عروض', 'إعلان عن احتياج مدرب', 'إعلان عن احتياج مساعد مدرب']);
            $table->foreignId('training_advertisement_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('tender_advertisement_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('trainer_need_advertisement_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('trainer_assistant_advertisement_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}; 