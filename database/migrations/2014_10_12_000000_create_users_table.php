<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->enum('role', ['Superuser', 'Administrator', 'Guest']);
            $table->string('nama');
            $table->string('nik')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('email');
            $table->string('telp')->nullable();
            $table->string('alamat')->nullable();
            $table->enum('jabatan', ['Kepala Sekolah', 'Wakil Kepala Sekolah', 'Kepala Lab', 'Guru']);
            $table->enum('agama', ['Islam', 'Buddha', 'Kristen', 'Katholik', 'Hindu']);
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('gambar')->nullable()->default('default_profile.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->dateTime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
