@extends('adminlte::page')

@section('title', 'e-Sarpras | Tambah Pengguna')

@section('content_header')
    <h1>Pengguna</h1>
@stop

@section('content')

    @if (session()->has('success'))
    <x-adminlte-alert theme="success" title="Success" dismissable>
        {{ session('success') }}
    </x-adminlte-alert>
    @endif

    <x-adminlte-card theme="success" theme-mode="outline" title="Tambah Pengguna">
        <form action="/register" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-4 mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control shadow-sm @error('username') is-invalid @enderror" value="{{ old('username') }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control shadow-sm @error('password') is-invalid @enderror">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="role">Role</label>
                    <select class="form-control shadow-sm" name="role">
                        <option value="Superuser">Superuser</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Guest">Guest</option>
                    </select>
                </div>

            </div>

            <div class="row">

                <div class="col-md-4 mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control shadow-sm @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" class="form-control shadow-sm @error('nik') is-invalid @enderror" value="{{ old('nik') }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control shadow-sm @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}">
                </div>

            </div>

            <div class="row">

                <div class="col-md-4 mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control shadow-sm @error('email') is-invalid @enderror" value="{{ old('email') }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="telp">No. Telp</label>
                    <input type="text" name="telp" class="form-control shadow-sm @error('telp') is-invalid @enderror" value="{{ old('telp') }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control shadow-sm @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">
                </div>

            </div>

            <div class="row">

                <div class="col-md-3 mb-3">
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control shadow-sm" name="jabatan">
                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                        <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                        <option value="Kepala Lab">Kepala Lab</option>
                        <option value="Guru">Guru</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="agama">Agama</label>
                    <select class="form-control shadow-sm" name="agama">
                        <option value="Islam">Islam</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Hindu">Hindu</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="gender">Jenis Kelamin</label>
                    <select class="form-control shadow-sm" name="gender">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <x-adminlte-input-file name="gambar" label="Foto Profil" placeholder="Pilih gambar..." />
                </div>

            </div>
            <div class="row">
                <a href="{{ route('user.list') }}" class="mr-auto">
                    <x-adminlte-button icon="fas fa-fw fa-long-arrow-alt-left" label="Kembali" theme="secondary"
                        type="button" class="btn-sm mt-3" />
                </a>
                <x-adminlte-button icon="fas fa-fw fa-save" label="Tambah" theme="primary" type="submit"
                    class="btn-sm mt-3" />
            </div>
        </form>
    </x-adminlte-card>

@stop
