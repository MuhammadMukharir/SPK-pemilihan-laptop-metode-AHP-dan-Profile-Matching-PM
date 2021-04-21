<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableForAhp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahp', function (Blueprint $table) {
            $table->id('id_perhitungan');
            $table->string('nama_perhitungan');
            $table->boolean('is_konsisten')->default(0);
            $table->boolean('is_dipilih')->default(0);
            $table->text('detail');
            $table->timestamps();
        });

        Schema::create('perbandingan_berpasangan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_perhitungan');
            $table->string('nama_kriteria');
            $table->double('c1');
            $table->double('c2');
            $table->double('c3');
            $table->double('c4');
            $table->double('c5');
            $table->double('c6');
            $table->double('c7');
            $table->double('c8');
            $table->double('c9');
            $table->double('c10');
            $table->double('c11');
            $table->double('c12');

            $table->foreign('id_perhitungan')
                ->references('id_perhitungan')
                ->on('ahp')
                ->onDelete('cascade');
        });

        Schema::create('bobots', function (Blueprint $table) {
            $table->unsignedBigInteger('id_perhitungan');
            // $table->string('nama_kriteria');
            $table->double('c1');
            $table->double('c2');
            $table->double('c3');
            $table->double('c4');
            $table->double('c5');
            $table->double('c6');
            $table->double('c7');
            $table->double('c8');
            $table->double('c9');
            $table->double('c10');
            $table->double('c11');
            $table->double('c12');

            $table->double('lamda_max');
            $table->double('consistency_index');
            $table->double('consistency_ratio');

            $table->timestamps();

            $table->foreign('id_perhitungan')
                ->references('id_perhitungan')
                ->on('ahp')
                ->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bobots');
        Schema::dropIfExists('perbandingan_berpasangans_tables');
        Schema::dropIfExists('ahp');
    }
}