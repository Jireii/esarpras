@extends('adminlte::page')

@section('title', 'e-Sarpras - Sunting Sarpras')

@section('content_header')
    <h1>Sarpas</h1>
@stop

@section('content')
    @if (session('status'))
        <x-adminlte-alert class="bg-teal" dismissable>
            {{ session('status') }}
        </x-adminlte-alert>
    @endif
    <x-adminlte-card title="Sunting Sarpras" theme="success" theme-mode="outline">
        <form action="{{ route('asset.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <x-adminlte-input name="nama" label="Nama" placeholder="Nama Sarpras" value="{{ $data->nama }}"
                    fgroup-class="col-md-4" disable-feedback />
                <x-adminlte-input name="tipe" label="Tipe" placeholder="Tipe Sarpras"
                    value="{{ $data->tipe }}" fgroup-class="col-md-4" disable-feedback />
                <x-adminlte-input name="merk" label="Merk" placeholder="Merk Sarpras"
                    value="{{ $data->merk }}" fgroup-class="col-md-4" disable-feedback />
                <x-adminlte-input name="register" label="Nomor Register" placeholder="Nomor Register"
                    value="{{ $data->register }}" fgroup-class="col-md-4" disable-feedback />
                <x-adminlte-input type="number" name="tahun_beli" label="Tahun Pembelian" placeholder="Tahun Pembelian"
                    value="{{ $data->tahun_beli }}" fgroup-class="col-md-4" disable-feedback />
                <x-adminlte-input type="number" name="harga" label="Harga Buku" placeholder="{{ $data->harga }}"
                    value="{{ $data->harga }}" fgroup-class="col-md-4" disable-feedback>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <span class="fw-bold">Rp</span>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select name="dana" label="Sumber Dana" placeholder="Sumber Dana" fgroup-class="col-md-3">
                    <option value={{ $data->dana }}>{{ $data->dana }}</option>
                    @if ($data->dana != 'BOS')
                        <option value="BOS">BOS</option>
                    @else
                        <option value="BOSDA">BOSDA</option>
                    @endif
                </x-adminlte-select>
                <x-adminlte-select name="kondisi" label="Kondisi" placeholder="Kondisi" fgroup-class="col-md-3">
                    <option value={{ $data->kondisi }}>{{ $data->kondisi }}</option>
                    @if ($data->kondisi != 'Baik')
                        <option value="Baik">Baik</option>
                    @else
                        <option value="Rusak">Rusak</option>
                    @endif

                </x-adminlte-select>

                <x-adminlte-select name="space_id" label="Ruangan" placeholder="Ruangan" fgroup-class="col-md-3">
                    @foreach ($spaces as $space)
                        <option value={{ $data->space_id }}>Pilih</option>
                        <option value={{ $space->id }}>{{ $space->nama }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-input type="file" name="gambar" label="Gambar Buku" placeholder="Gambar Buku"
                    value="{{ $data->gambar }}" fgroup-class="col-md" disable-feedback />
            </div>
            <div class="row mt-3">
                    <a href="{{ route('asset.detail', $data->id) }}" class="mr-auto">
                        <button class="btn btn-sm btn-secondary" type="button">
                            <i class="fas fa-fw fa-arrow-left"></i>
                            Kembali
                        </button>
                    </a>
                    <x-adminlte-button class="btn btn-sm" type="submit" label=" Perbarui" theme="success" icon="fas fa-fw fa-save" />
            </div>
        </form>
    </x-adminlte-card>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
