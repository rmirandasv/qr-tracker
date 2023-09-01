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
        Schema::create('qr_link_link_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qr_link_id');
            $table->unsignedBigInteger('qr_link_tag_id');

            $table->foreign('qr_link_id')->references('id')->on('qr_links');
            $table->foreign('qr_link_tag_id')->references('id')->on('qr_link_tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_link_link_tags');
    }
};
