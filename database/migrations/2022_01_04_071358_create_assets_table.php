<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gambar')->default('default_asset.png');
            $table->string('merk')->nullable();
            $table->string('tipe');
            $table->string('register')->nullable();
            $table->integer('harga')->default(0);
            $table->year('tahun_beli')->nullable();
            $table->enum('dana', ['BOS', 'BOSDA'])->nullable();
            $table->enum('kondisi', ['Baik', 'Rusak']);
            $table->foreignId('space_id')->constrained();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('assets');
    }
}
