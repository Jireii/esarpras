@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>Sarpras</h1>
@stop

@section('content')
    @if (session('status'))
        <x-adminlte-alert class="bg-teal" dismissable>
            {{ session('status') }}
        </x-adminlte-alert>
    @endif
    <x-adminlte-card title="Detail Sarpras {{ $data->judul }}" theme="success" theme-mode="outline">
        <div class="row">
            <div class="col-lg-2">
                <div class="mb-3 form-input">
                    <label for="" class="mb-1 fw-bold">Gambar Sarpras</label>
                    <div class="input-group">
                        <img src=" {{ asset('images/') }}/{{ $data->gambar }}" class="img-thumbnail" alt="Gambar Sarpras" height="100%" width="100%">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <x-adminlte-input name="nama" label="Nama" placeholder="Nama Sarpras" disabled value="{{ $data->nama }}"
                fgroup-class="col-md-4" disable-feedback />
            <x-adminlte-input name="tipe" label="Tipe" placeholder="Tipe Sarpras" disabled
                value="{{ $data->tipe }}" fgroup-class="col-md-4" disable-feedback />
            <x-adminlte-input name="merk" label="Merk" placeholder="Merk Sarpras" disabled
                value="{{ $data->merk }}" fgroup-class="col-md-4" disable-feedback />
            <x-adminlte-input name="register" label="Nomor Register" placeholder="Nomor Register" disabled
                value="{{ $data->register }}" fgroup-class="col-md-4" disable-feedback />
            <x-adminlte-input type="number" name="tahun_beli" label="Tahun Pembelian" placeholder="Tahun Pembelian" disabled
                value="{{ $data->tahun_beli }}" fgroup-class="col-md-4" disable-feedback />
            <x-adminlte-input type="number" name="harga" label="Harga Buku" placeholder="{{ $data->harga }}" disabled
                value="{{ $data->harga }}" fgroup-class="col-md-4" disable-feedback>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <span class="fw-bold">Rp</span>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="row">
            <x-adminlte-select name="dana" label="Sumber Dana" placeholder="Sumber Dana" disabled fgroup-class="col-md-4">
                <option value={{ $data->dana }}>{{ $data->dana }}</option>
                @if ($data->dana != 'BOS')
                    <option value="BOS">BOS</option>
                @else
                    <option value="BOSDA">BOSDA</option>
                @endif
            </x-adminlte-select>
            <x-adminlte-select name="kondisi" label="Kondisi" placeholder="Kondisi" disabled fgroup-class="col-md-4">
                <option value={{ $data->kondisi }}>{{ $data->kondisi }}</option>
                @if ($data->kondisi != 'Baik')
                    <option value="Baik">Baik</option>
                @else
                    <option value="Rusak">Rusak</option>
                @endif

            </x-adminlte-select>

            <x-adminlte-select name="space_id" label="Ruangan" placeholder="Ruangan" disabled fgroup-class="col-md-4">
                @foreach ($spaces as $space)
                    <option value={{ $data->space_id }}>Pilih</option>
                    <option value={{ $space->id }}>{{ $space->nama }}</option>
                @endforeach
            </x-adminlte-select>
        </div>
        <div class="row">
            <a href="{{ route('asset') }}" class="mr-auto">
                <x-adminlte-button class="btn btn-sm" type="button" label="Kembali" theme="secondary" icon="fas fa-fw fa-long-arrow-alt-left" />
            </a>
            <x-adminlte-button class="btn btn-sm mr-lg-2" type="button" label=" Hapus" theme="danger" icon="fas fa-fw fa-trash" data-toggle="modal" data-target="#modalHapus"/>
            <a href="{{ route('asset.edit', $data->id) }}">
                <x-adminlte-button class="btn btn-sm" type="buttons" label=" Sunting" theme="success" icon="fas fa-fw fa-pen" />
            </a>
        </div>
    </x-adminlte-card>

    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Sarpras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus sarpras "{{ $data->nama }}"?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('asset.destroy', $data->id) }}" method="POST">
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
