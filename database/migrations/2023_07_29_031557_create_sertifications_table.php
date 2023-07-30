<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('responsibler_id');
            // $table->foreignId('factory_id');
            // $table->foreignId('outlet_id');
            // $table->foreignId('halalist_id')->nullable();
            // $table->foreignId('legalist_id');
            // $table->foreignId('product_id');
            $table->foreignId('register_id')->nullable();
            $table->foreignId('status_id');
            $table->string('id_number');
            $table->timestamp('date');
            $table->string('apply_number', 100);
            $table->string('service_type', 100);
            $table->string('brand_name', 255);
            $table->string('lph');
            $table->string('doc_type');
            $table->string('product_type');
            $table->string('install_area');
            $table->integer('bills')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('sertifications');
    }
}
