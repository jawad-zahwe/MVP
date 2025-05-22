<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tender_advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertisement_id')->constrained()->onDelete('cascade');
            $table->foreignId('organization_id')->constrained()->onDelete('cascade');
            
            // معلومات أساسية
            $table->text('description');
            $table->integer('training_days');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('city_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->integer('number_of_applicants');
            
            // تواريخ النشر والتقديم
            $table->date('publish_date');
            $table->date('submission_deadline');
            
            // تفاصيل التدريب
            $table->string('organization_type');
            $table->string('implementation_method');
            $table->string('training_level');
            $table->string('training_language');
            $table->string('trainee_type');
            
            // معلومات المؤسسة والخدمات
            $table->text('organization_info');
            $table->text('required_services');
            $table->text('training_requirements');
            $table->text('payment_terms');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tender_advertisements');
    }
}; 