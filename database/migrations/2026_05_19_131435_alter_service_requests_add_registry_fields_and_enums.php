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
        Schema::table('service_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('service_requests', 'email')) {
                $table->string('email')->nullable()->after('name');
            }
            if (!Schema::hasColumn('service_requests', 'property_type')) {
                $table->string('property_type')->nullable()->after('request_type');
            }
            if (!Schema::hasColumn('service_requests', 'preferred_time')) {
                $table->string('preferred_time')->nullable()->after('preferred_date');
            }
        });

        // Safe enum alter
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE service_requests MODIFY COLUMN request_type ENUM('home_service', 'vaculation_search_report', 'vacation_search_report', 'registry_home_service') NOT NULL");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE service_requests MODIFY COLUMN status ENUM('pending', 'in_review', 'approved', 'completed', 'rejected') DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_requests', function (Blueprint $table) {
            if (Schema::hasColumn('service_requests', 'email')) {
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('service_requests', 'property_type')) {
                $table->dropColumn('property_type');
            }
            if (Schema::hasColumn('service_requests', 'preferred_time')) {
                $table->dropColumn('preferred_time');
            }
        });
        
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE service_requests MODIFY COLUMN request_type ENUM('home_service', 'vaculation_search_report') NOT NULL");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE service_requests MODIFY COLUMN status ENUM('pending', 'in_review', 'completed', 'rejected') DEFAULT 'pending'");
    }
};
