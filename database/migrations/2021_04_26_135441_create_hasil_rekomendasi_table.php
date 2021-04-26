<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilRekomendasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_rekomendasi', function (Blueprint $table) {
            $tableNames['users'] = 'users';
            $tableNames['products'] = 'products';

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->double('n_bobot');

            $table->foreign('user_id')
                ->references('id')
                ->on($tableNames['users'])
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on($tableNames['products'])
                ->onDelete('cascade');

            $table->primary(['user_id', 'product_id'], 'hasil_rekomendasi_user_id_product_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_rekomendasi');
    }
}
