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
        Schema::create('regions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('franchise_id')->constrained('franchises', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('business_operation_id')->constrained('business_operations', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('operations_manager_id')->constrained('operations_managers', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->text('observation')->nullable();
            $table->boolean('enabled')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};
