<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->foreign('type_id')
                ->references('id')
                ->on('organization_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->foreign('type_id')
                ->references('id')
                ->on('sectors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
};
