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

        // nilai ahp dan pm yang digunakan
        Schema::create('nilai_ahp_pm_digunakan_hasil_rekomendasi', function (Blueprint $table) {
            $tableNames['users'] = 'users';

            $table->unsignedBigInteger('user_id');

            $table->double('bobot_harga');
            $table->double('bobot_prosesor');
            $table->double('bobot_kapasitas_ram');
            $table->double('bobot_kapasitas_hdd');
            $table->double('bobot_kapasitas_ssd');
            $table->double('bobot_kapasitas_vram');
            $table->double('bobot_kapasitas_maxram');
            $table->double('bobot_berat');
            $table->double('bobot_ukuran_layar');
            $table->double('bobot_jenis_layar');
            $table->double('bobot_refresh_rate');
            $table->double('bobot_resolusi_layar');

            $table->string('pref_harga');
            $table->string('pref_prosesor');
            $table->string('pref_kapasitas_ram');
            $table->string('pref_kapasitas_hdd');
            $table->string('pref_kapasitas_ssd');
            $table->string('pref_kapasitas_vram');
            $table->string('pref_kapasitas_maxram');
            $table->string('pref_berat');
            $table->string('pref_ukuran_layar');
            $table->string('pref_jenis_layar');
            $table->string('pref_refresh_rate');
            $table->string('pref_resolusi_layar');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on($tableNames['users'])
                ->onDelete('cascade');

            $table->primary(['user_id'], 'nilai_ahp_pm_digunakan_hasil_rekomendasi_user_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_ahp_pm_digunakan_hasil_rekomendasi');
        Schema::dropIfExists('hasil_rekomendasi');
    }
}
