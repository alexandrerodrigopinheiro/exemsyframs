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
        Schema::create('debt_collectors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('franchise_id')->constrained('franchises', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('business_operation_id')->constrained('business_operations', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('identity')->nullable();
            $table->string('addres')->nullable();
            $table->string('phone')->nullable();
            $table->string('username');
            $table->string('password');
            $table->text('observation')->nullable();
            $table->boolean('enabled')->default(true);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debt_collectors');
    }
};
