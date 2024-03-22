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
        Schema::create('dispatchrequest', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('pickup_request_details');
            $table->string('pickup_address');
            $table->string('item_pickup');
            $table->string('recipient_name');
            $table->string('recipient_phone');
            $table->string('dropoff_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispatchrequest');
    }
};
