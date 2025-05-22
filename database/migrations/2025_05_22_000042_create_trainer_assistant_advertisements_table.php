<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trainer_assistant_advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertisement_id')->constrained()->onDelete('cascade');
            $table->foreignId('organization_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('trainer_id')->nullable()->constrained()->onDelete('cascade');
            
            // معلومات أساسية
            $table->text('description');
            $table->integer('training_days');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('price', 10, 2);
            $table->foreignId('country_id')->constrained();
            $table->foreignId('city_id')->constrained();
            
            // تواريخ النشر والتقديم
            $table->date('publish_date');
            $table->date('submission_deadline');
            $table->integer('number_of_applicants');
            
            // تفاصيل التدريب
            $table->string('implementation_method');
            $table->string('training_location');
            $table->string('training_level');
            $table->string('training_language');
            $table->string('trainee_type');
            $table->string('payment_method');
            $table->string('submission_mechanism');
            $table->string('organization_type');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainer_assistant_advertisements');
    }
}; 