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
        Schema::create('filter_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filter_id')->constrained();
            $table->foreignId('installation_id')->nullable()->constrained();
            $table->date('change_date');
            $table->date('next_change_date');
            $table->foreignId('changed_by')->constrained('users');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('filter_changes');
    }
};