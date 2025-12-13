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
        Schema::create('data_tables', function (Blueprint $table) {
            $table->id();
			$table->string('code_b1_b2_edgetape', 10);
			$table->string('code_b2', 10)->nullable();
			$table->integer('width');
			$table->decimal('angel', 3, 1);
			$table->decimal('ga', 3, 1)->nullable(); //nanti dari table treatment
			$table->string('compd');
			$table->string('treat_code');
			$table->string('belt_cord')->nullable(); //nanti dari table treatment
			$table->enum('direction', ['lay_left', 'lay_right', 'lay_right_left']);
			$table->enum('posisi_edgetape', ['atas', 'tidak_ada']);
			$table->string('edgetape_b1');
			$table->enum('turn', ['normal', 'dibalik_2_kali']);
			$table->string('code_wraping')->nullable();
			$table->integer('width_after_wraping')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tables');
    }
};
