<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('asal', 100);
            $table->string('email')->unique();
            $table->string('no_tlpn', 20);
            
            // Questions using text type for flexible content
            $table->text('question_1');
            $table->text('question_2');
            $table->text('question_3');
            $table->text('kritik_dan_saran');
            
            // Additional useful fields
            $table->string('certificate_number')->unique();
            $table->timestamp('generated_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            // Performance optimizing indexes
            $table->index('email');
            $table->index('certificate_number');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};