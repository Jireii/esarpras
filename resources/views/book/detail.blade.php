@extends('adminlte::page')

@section('title', 'Detail Buku')

@section('content_header')
    <h1>Detail Buku</h1>
@stop

@section('content')
    @if (session('status'))
        <x-adminlte-alert class="bg-teal" dismissable>
            {{ session('status') }}
        </x-adminlte-alert>
    @endif
    <x-adminlte-card title="Detail Buku {{ $data->judul }}" theme="success" theme-mode="outline">
        <div class="col-lg-2">
            <div class="mb-3 form-input">
                <label for="" class="mb-1 fw-bold"> Image</label>
                <div class="input-group">
                    <img src=" {{ asset('images/') }}/{{ $data->gambar }}" class="img-thumbnail" alt="..." height="100%"
                        width="100%">
                </div>
            </div>
        </div>
        <div class="row">
            <x-adminlte-input name="judul" label="Judul" placeholder="Judul" value="{{ $data->judul }}"
                fgroup-class="col-md-4" disable-feedback disabled />
            <x-adminlte-input name="nomor_buku" label="Nomor ISBN/ISSN" placeholder="Nomor ISBN/ISSN"
                value="{{ $data->nomor_buku }}" fgroup-class="col-md-4" disable-feedback disabled />
            <x-adminlte-input name="register" label="Nomor Register" placeholder="Nomor Register"
                value="{{ $data->register }}" fgroup-class="col-md-4" disable-feedback disabled />
            <x-adminlte-input name="pengarang" label="Pengarang" placeholder="Pengarang" value="{{ $data->pengarang }}"
                fgroup-class="col-md-4" disable-feedback disabled />
            <x-adminlte-input name="penerbit" label="Penerbit" placeholder="Penerbit" value="{{ $data->penerbit }}"
                fgroup-class="col-md-4" disable-feedback disabled />
            <x-adminlte-input type="number" name="tahun_terbit" label="Tahun Terbit" placeholder="Tahun Terbit"
                value="{{ $data->tahun_terbit }}" fgroup-class="col-md-2" disable-feedback disabled />
            <x-adminlte-input type="number" name="tahun_beli" label="Tahun Pembelian" placeholder="Tahun Pembelian"
                value="{{ $data->tahun_beli }}" fgroup-class="col-md-2" disable-feedback disabled />
            <x-adminlte-input type="number" name="halaman" label="Jumlah Halaman" placeholder="Jumlah Halaman"
                value="{{ $data->halaman }}" fgroup-class="col-md-2" disable-feedback disabled />
            <x-adminlte-input type="number" name="harga" label="Harga Buku" placeholder="Harga"
                value="{{ $data->harga }}" fgroup-class="col-md-4" disable-feedback disabled>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <span class="fw-bold">Rp</span>
                    </div>
                </x-slot>
            </x-adminlte-input>
            <x-adminlte-select name="dana" label="Sumber Dana" placeholder="Sumber Dana" fgroup-class="col-md-1"
                disabled>
                <option value={{ $data->dana }}>{{ $data->dana }}</option>
            </x-adminlte-select>
            <x-adminlte-select name="kondisi" label="Kondisi" placeholder="Kondisi" fgroup-class="col-md-1" disabled>
                <option value={{ $data->kondisi }}>{{ $data->kondisi }}</option>
            </x-adminlte-select>

            <x-adminlte-select name="space_id" label="Ruangan" placeholder="Ruangan" fgroup-class="col-md-4" disabled>
                <option value={{ $data->space_id }}>{{ $data->space->nama }}</option>
            </x-adminlte-select>
        </div>
        <div class="row mt-3">
            <div class="col-lg-8">
                <a href="{{ route('book.edit', $data->id) }}">
                    <button class="btn btn-success" type="button">
                        <i class="fas fa-lg fa-edit"></i>
                        Sunting
                    </button>
                </a>
                <button class="btn btn-danger " title="Hapus" data-toggle="modal"
                    data-target="#modalHapus_{{ $data->id }}">
                    <i class="fa fa-fw fa-trash"></i> Hapus
                </button>
                <a href="{{ route('book') }}">
                    <button class="btn btn-secondary" type="button">
                        <i class="fas fa-lg fa-arrow-left"></i>
                        Kembali
                    </button>
                </a>
            </div>
        </div>
    </x-adminlte-card>

    <div class="modal fade" id="modalHapus_{{ $data->id }}" tabindex="-1" aria-labelledby="deleteModalLabel"
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
                    Apakah anda yakin ingin menghapus buku
                    {{ $data->judul }}
                    ?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('book.destroy', $data->id) }}" method="POST">
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
