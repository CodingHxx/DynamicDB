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
        Schema::table('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('business_credentials_id')->nullable()->constrained('business_credentials')->onDelete('set null');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedBigInteger('business_credentials_id')->nullable();
            // Add foreign key constraint if needed
            // $table->foreign('business_credentials_id')->references('id')->on('business_credentials');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
