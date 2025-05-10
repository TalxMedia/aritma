<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('assigned_user_id')->constrained('users');
            $table->foreignId('vehicle_id')->nullable()->constrained();
            $table->enum('type', ['device', 'filter', 'maintenance'])->default('device');
            $table->enum('status', ['pending', 'completed', 'cancelled', 'on_trial'])->default('pending');
            $table->datetime('scheduled_at');
            $table->datetime('completed_at')->nullable();
            $table->date('trial_end_date')->nullable();
            $table->text('notes')->nullable();
            $table->text('completion_notes')->nullable();
            $table->string('customer_signature')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installations');
    }
};