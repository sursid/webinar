<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('instansi', 100);
            $table->string('email')->unique();
            $table->string('no_tlpn', 20);
            $table->timestamps();
            $table->softDeletes(); // Implementing soft deletes for data integrity
            
            // Adding indexes for performance optimization
            $table->index('email');
            $table->index('no_tlpn');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};