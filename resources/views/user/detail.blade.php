@extends('adminlte::page')

@section('title', 'e-Sarpras | Detail Pengguna')

@section('content_header')
    <h1>Pengguna</h1>
@stop

@section('content')

    @if (session()->has('success'))
    <x-adminlte-alert theme="success" title="Success" dismissable>
        {{ session('success') }}
    </x-adminlte-alert>
    @endif

    <x-adminlte-card theme="success" theme-mode="outline" title="Detail Pengguna">
        <div class="row">

            <div class="col-md-4 mt-3">
                <label for="" >Foto</label>
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
            {{-- <div class="col-md-2 mt-2">
                <div class="d-grid">
                    <a href="/users/{{ $user->id }}/edit">
                        <x-adminlte-button icon="fas fa-fw fa-edit" label="Sunting" theme="success" type="button"
                            class="btn-sm mt-3" />
                    </a>
                </div>
            </div> --}}

            <a href="{{ route('user.list') }}" class="mr-auto">
                <x-adminlte-button icon="fas fa-fw fa-long-arrow-alt-left" label="Kembali" theme="secondary" type="button"
                    class="btn-sm mt-3" />
            </a>
            <div class="opsi">
                <button class="btn btn-danger btn-sm mt-3" title="Hapus" data-toggle="modal"
                    data-target="#modalHapus_{{ $user->id }}">
                    <i class="fa fa-fw fa-trash"></i> Hapus
                </button>
                <a href="{{ route('user.edit', $user->id) }}">
                    <x-adminlte-button icon="fas fa-fw fa-edit" label="Sunting" theme="success" type="button"
                        class="btn-sm mt-3" />
                </a>
            </div>
        </div>
    </x-adminlte-card>

    <div class="modal fade" id="modalHapus_{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus pengguna
                    {{ $user->nama }}
                    ?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('user.delete', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="mr-auto px-3 py-1 btn btn-secondary btn-sm" data-bs-dismiss="modal"
                            data-dismiss="modal">Tidak</button>
                        <button type="submit" class="px-3 py-1 btn btn-danger btn-sm">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
