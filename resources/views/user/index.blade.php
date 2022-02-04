@extends('adminlte::page')

@section('title', 'e-Sarpras | Profil')

@section('content_header')
    <h1>Profil</h1>
@stop

@section('content')

    @if (session()->has('success'))
        <x-adminlte-alert theme="success" title="Success" dismissable>
            {{ session('success') }}
        </x-adminlte-alert>
    @elseif (session()->has('failed'))
        <x-adminlte-alert theme="danger" title="Success" dismissable>
            {{ session('failed') }}
        </x-adminlte-alert>
    @endif

    <x-adminlte-card theme="success" theme-mode="outline">
        <div class="row">
            <div class="col-md-4 mt-3">
                <label for="">Foto</label>
                <div class="text-center border rounded position-relative shadow-sm" style="background-color:rgb(233,236,239);">
                    <img class="img img-thumbnail" src="{{ asset("/images/$user->gambar") }}" alt="Foto Profil" style="margin:auto; height:13.3rem; max-width:21rem;">
                </div>
            </div>

            <div class="col-md">
                <label for="" class="mt-3">Nama</label>
                <input type="text" class="form-control shadow-sm" disabled name="nama" value="{{ $user->nama }}">

                <label for="" class="mt-3">Jabatan</label>
                <input type="text" class="form-control shadow-sm" disabled name="status" value="{{ $user->jabatan }}">

                <label for="" class="mt-3">Hak Akses</label>
                <input type="text" class="form-control shadow-sm" disabled name="role" value="{{ $user->role }}">
            </div>

        </div>

        <div class="row">
            <div class="col-md">
                <label for="" class="mt-3">Email</label>
                <input type="text" class="form-control shadow-sm" disabled name="email" value="{{ $user->email }}">
            </div>
            <div class="col-md">
                <label for="" class="mt-3">Nomor Telpon</label>
                <input type="text" class="form-control shadow-sm" disabled name="telpon" value="{{ $user->telp }}">
            </div>
            <div class="col-md">
                <label for="" class="mt-3">Alamat</label>
                <input type="text" class="form-control shadow-sm" disabled name="alamat" value="{{ $user->alamat }}">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md">
                <label for="" class="mt-3">NIK</label>
                <input type="text" class="form-control shadow-sm" disabled name="nik" value="{{ $user->nik }}">
            </div>
            <div class="col-md">
                <label for="" class="mt-3">Agama</label>
                <input type="text" class="form-control shadow-sm" disabled name="agama" value="{{ $user->agama }}">
            </div>
            <div class="col-md">
                <label for="" class="mt-3">Jenis Kelamin</label>
                <input type="text" class="form-control shadow-sm" disabled name="gender" value="{{ $user->gender }}">
            </div>
        </div>

        <div class="row">
            <a href="{{ route('dashboard') }}" class="mr-auto">
                <x-adminlte-button icon="fas fa-fw fa-long-arrow-alt-left" label="Kembali" theme="secondary" type="button"
                    class="btn-sm mt-3" />
            </a>
            <a href="/profil/{{ auth()->user()->id }}/edit" }}">
                <x-adminlte-button icon="fas fa-fw fa-edit" label="Edit" theme="success" type="button"
                    class="btn-sm mt-3" />
            </a>
        </div>
    </x-adminlte-card>

@stop
