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
        Schema::create('personal_information', function (Blueprint $table) {
            //section 1
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('salutation')->nullable();
            $table->string('full_names');
            $table->integer('id_number')->unique();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->foreignId('county_id')->constrained()->onDelete('cascade');
            $table->foreignId('constituency_id')->constrained()->onDelete('cascade');
            $table->foreignId('ward_id')->constrained()->onDelete('cascade');
            $table->date('date_of_birth');
            $table->enum('gender',['male','female','other']);
            $table->string('kra_pin')->unique()->nullable();
            $table->string('postal_code')->nullable();
            $table->string('email')->unique();
            $table->integer('mobile_number')->unique();
            $table->boolean('is_pwd')->default(false);
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
        Schema::dropIfExists('personal_information');
    }
};
