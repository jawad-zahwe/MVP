<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('training_advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->onDelete('cascade');
            $table->foreignId('trainer_id')->nullable()->constrained()->onDelete('set null');
            $table->string('title');
            $table->text('dio');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration');
            $table->decimal('price', 10, 2);
            $table->string('location');
            $table->integer('max_participants');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('training_advertisements');
    }
}; 