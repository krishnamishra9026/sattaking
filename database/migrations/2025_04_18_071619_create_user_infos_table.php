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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->string('nationality')->nullable();
            $table->string('location')->nullable();
            $table->text('address')->nullable();
            $table->string('job_title')->nullable();
            $table->string('industry')->nullable();
            $table->text('bio')->nullable();
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('skills')->nullable();
            $table->string('languages_known')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_job_title')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->text('job_description')->nullable();
            $table->string('resume')->nullable();
            $table->string('portfolio_link')->nullable();
            $table->enum('step',[1,2,3,4,5])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
