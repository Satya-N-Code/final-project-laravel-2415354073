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
        Schema::create("subscriptions", function (Blueprint $table) {
            $table->id();
            $table->foreignId("customer_id")->constrained("customers")->restrictOnDelete();
            $table->foreignId("service_id")->constrained("services")->restrictOnDelete();
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->string("status")->default("trial"); // active, inactive, trial, isolir, dismantle
            $table->timestamps();
        });
    }
    // Saya menggunakan restrictOnDelete() agar sistem menolak penghapusan Customer 
    // atau Service jika mereka masih memiliki data langganan yang aktif. 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
