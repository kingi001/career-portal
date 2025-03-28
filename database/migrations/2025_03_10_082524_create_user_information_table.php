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
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('salutation', [
                'Mr.', 'Mrs.', 'Miss', 'Dr.', 'Prof.', 'Eng.', 'Hon.', 'Rev.'
            ])->nullable();
            $table->string('surname', 100);
            $table->string('other_names', 150);
            $table->string('national_id_number', 20)->unique();
            $table->foreignId('ethnicity_id')->constrained()->onDelete('cascade');
            $table->foreignId('county_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_county_id')->constrained()->onDelete('cascade');
            $table->foreignId('ward_id')->constrained()->onDelete('cascade');
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->enum('religion', ['Christianity', 'Islam', 'Hinduism','Budhism','other']);

            $table->string('mobile_number', 12)->unique()->index();
            $table->string('postal_code', 10)->index();
            $table->boolean('is_pwd')->nullable();
            $table->string('pwd_type')->nullable();
            $table->string('ncpwd_number')->nullable();
            // Current Employment Details
            $table->enum('bma_applicant', ['yes', 'no'])->nullable();
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
             $table->enum('terms_of_service', ['permanent', 'contract', 'internship', 'casual'])->nullable();
            $table->string('job_scale')->nullable();
            $table->date('date_of_appointment')->nullable();
            // Other Personal Details
            $table->enum('criminal_offense', ['yes', 'no'])->nullable();
            $table->text('criminal_details')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_information');
    }
};
