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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('request_type', ['vacation_search_report', 'registry_home_service']);
            $table->string('service_type')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('mobile');
            $table->string('property_type')->nullable();
            $table->text('property_address')->nullable();
            $table->text('address')->nullable();
            $table->date('preferred_date')->nullable();
            $table->time('preferred_time')->nullable();
            $table->string('document')->nullable();
            $table->text('remark')->nullable();
            $table->enum('status', ['pending', 'in_review', 'approved', 'completed', 'rejected'])->default('pending');
            $table->text('admin_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
