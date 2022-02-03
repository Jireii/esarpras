<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('gambar')->default('default_book.png');
            $table->string('nomor_buku')->nullable();
            $table->string('pengarang');
            $table->string('penerbit');
            $table->year('tahun_terbit');
            $table->integer('halaman')->length(11)->nullable();
            $table->string('register')->nullable();
            $table->year('tahun_beli')->nullable();
            $table->integer('harga')->length(11)->default(0);;
            $table->enum('dana', ['BOS', 'BOSDA']);
            $table->enum('kondisi', ['Baik', 'Rusak']);
            $table->foreignId('space_id')->nullable()->constrained();
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
        Schema::dropIfExists('books');
    }
}
