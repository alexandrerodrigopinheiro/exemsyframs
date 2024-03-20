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
        Schema::create('softwares', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('developer')->nullable();
            $table->string('publisher')->nullable();
            $table->float('denomination', 10)->default(0.1);
            $table->float('house_edge', 10)->default(0.0);
            $table->float('rtp', 10)->default(0.0);
            $table->float('royalties', 10)->default(0.0);
            $table->integer('volatility');
            $table->boolean('proggressive_jackpot')->default(false);
            $table->boolean('fixed_jackpot')->default(false);
            $table->boolean('free_spins')->default(false);
            $table->boolean('interactive_mini_games')->default(false);
            $table->boolean('bonus_rounds')->default(false);
            $table->boolean('respin_rounds')->default(false);
            $table->boolean('wild_symbols')->default(false);
            $table->boolean('scatters_symbols')->default(false);
            $table->boolean('pick_and_win_rounds')->default(false);
            $table->boolean('super_stacked_symbols_rounds')->default(false);
            $table->boolean('guaranteed_jackpot_rounds')->default(false);
            $table->boolean('expanding_symbols')->default(false);
            $table->boolean('sticky_symbols')->default(false);
            $table->boolean('cluster_symbols')->default(false);
            $table->boolean('cascading_symbols')->default(false);
            $table->boolean('colossal_symbols')->default(false);
            $table->boolean('stacked_symbols')->default(false);
            $table->boolean('mystery_symbols')->default(false);
            $table->boolean('megaways')->default(false);
            $table->boolean('hold_and_spin')->default(false);
            $table->boolean('reel_modifiers')->default(false);
            $table->boolean('turbo_spin')->default(false);
            $table->boolean('nudges')->default(false);
            $table->boolean('wild_multipliers')->default(false);
            $table->boolean('walking_wilds')->default(false);
            $table->boolean('double_up')->default(false);
            $table->boolean('multipliers')->default(false);
            $table->boolean('symbol_collection')->default(false);
            $table->boolean('feature_buy')->default(false);
            $table->boolean('mega_spins')->default(false);
            $table->boolean('reels_sync')->default(false);
            $table->boolean('win_boosters')->default(false);
            $table->boolean('random_features')->default(false);
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
        Schema::dropIfExists('softwares');
    }
};
