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
        Schema::create('equipment_readings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('franchise_id')->constrained('franchises', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('business_operation_id')->constrained('business_operations', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('operations_manager_id')->constrained('operations_managers', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('region_id')->constrained('regions', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('point_id')->constrained('points', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('software_id')->constrained('softwares', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('jackpot_paid')->default(false);
            $table->float('absolute_input_value', 10)->default(0.0);
            $table->float('absolute_output_value', 10)->default(0.0);
            $table->float('absolute_balance_value', 10)->default(0.0);
            $table->float('relative_input_value', 10)->default(0.0);
            $table->float('relative_output_value', 10)->default(0.0);
            $table->float('relative_balance_value', 10)->default(0.0);
            $table->text('observation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_readings');
    }
};
