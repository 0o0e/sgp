<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['guardian', 'child']);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            
            // Basic information
            $table->string('nickname')->nullable();
            $table->integer('age')->nullable();
            $table->string('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('nationality')->nullable();
            
            // Real form (for guardians)
            $table->string('real_eye_color')->nullable();
            $table->string('real_hair_color')->nullable();
            $table->string('real_hair_length')->nullable();
            $table->text('real_distinguishing_features')->nullable();
            $table->text('real_abilities')->nullable();
            $table->string('real_form_image')->nullable();
            
            // Human form (for guardians)
            $table->string('human_fake_name')->nullable();
            $table->string('human_fake_nickname')->nullable();
            $table->integer('human_fake_age')->nullable();
            $table->string('human_fake_birthday')->nullable();
            $table->string('human_fake_nationality')->nullable();
            $table->text('human_appearance')->nullable();
            $table->string('human_form_image')->nullable();
            
            // Child information
            $table->unsignedBigInteger('paired_partner_id')->nullable();
            $table->string('school')->nullable();
            $table->text('family')->nullable();
            
            // Personality
            $table->text('likes')->nullable();
            $table->text('dislikes')->nullable();
            $table->text('personality')->nullable();
            
            // Backstory
            $table->text('backstory')->nullable();
            
            // Images
            $table->string('before_image')->nullable();
            $table->string('after_image')->nullable();
            
            $table->timestamps();
            
            $table->foreign('paired_partner_id')->references('id')->on('characters')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('characters');
    }
}; 