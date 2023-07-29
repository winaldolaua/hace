<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalalistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halalists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sk_number');
            $table->string('ktp_number');
            $table->string('doc_date');
            $table->string('sertif_number');
            $table->string('halalist_number');
            $table->string('sertif_date');
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
        Schema::dropIfExists('halalists');
    }
}
