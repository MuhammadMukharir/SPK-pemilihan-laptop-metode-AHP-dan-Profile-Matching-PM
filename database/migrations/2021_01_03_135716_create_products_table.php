<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('detail');
            $table->double('harga');
            $table->double('prosesor');
            $table->double('kapasitas_ram');
            $table->double('kapasitas_hdd');
            $table->double('kapasitas_ssd');
            $table->double('kapasitas_vram');
            $table->double('kapasitas_maxram');
            $table->double('berat');
            $table->double('ukuran_layar');
            $table->unsignedSmallInteger('jenis_layar');
            $table->unsignedSmallInteger('refresh_rate');
            $table->unsignedInteger('resolusi_layar');
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
        Schema::dropIfExists('products');
    }
}
