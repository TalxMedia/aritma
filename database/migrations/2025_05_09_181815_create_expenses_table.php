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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('category', ['personnel', 'technical', 'rent', 'utilities', 'vehicle', 'office', 'other'])
                  ->default('other');
            $table->decimal('amount', 10, 2);
            $table->date('date');
            $table->foreignId('user_id')->nullable()->comment('İlgili personel')->constrained();
            $table->foreignId('vehicle_id')->nullable()->comment('İlgili araç')->constrained();
            $table->foreignId('supplier_id')->nullable()->comment('İlgili tedarikçi')->constrained();
            $table->foreignId('created_by')->constrained('users');
            $table->string('receipt_image')->nullable();
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
        Schema::dropIfExists('expenses');
    }
};