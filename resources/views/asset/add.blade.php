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
<x-adminlte-card title="Tambah Sarpras" theme="green" theme-mode="outline">
    <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="nama" class="form-label">Nama</label>
                <div class="mb-3 input-group">
                    <input type="text" class="form-control" id="nama" name="nama"  placeholder="Masukkan nama sarpras" required>
                </div>
            </div>
            <div class="col-md-4">
                <label for="tipe" class="form-label">Tipe</label>
                <div class="mb-3 input-group">
                    <input type="text" class="form-control" id="tipe" name="tipe"  placeholder="Masukkan tipe sarpras" required>
                </div>
            </div>
            <div class="col-md-4">
                <label for="merk" class="form-label">Merk</label>
                <div class="mb-3 input-group">
                    <input type="text" class="form-control" id="merk" name="merk"  placeholder="Masukkan merk sarpras" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="register" class="form-label">Nomor Register</label>
                <div class="mb-3 input-group">
                    <input type="text" class="form-control" id="register" name="register"  placeholder="Masukkan nomor register" required>
                </div>
            </div>
            <div class="col-md-4">
                <label for="harga" class="form-label">Harga</label>
                <div class="mb-3 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                    </div>
                    <input type="text" id="harga" class="form-control" name="harga" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Masukkan harga satuan" required>
                </div>
            </div>
            <div class="col-md-4">
                <label for="tahun_beli" class="form-label">Tahun Pembelian</label>
                <div class="mb-3 input-group">
                    <input type="text" class="form-control" id="tahun_beli" name="tahun_beli"  placeholder="Masukkan tahun pembelian" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="dana" class="form-label">Sumber Dana</label>
                <div class="mb-3 input-group">
                    <select class="form-control" id="dana" name="dana" required>
                        <option value="BOS">BOS</option>
                        <option value="BOSDA">BOSDA</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <label for="kondisi" class="form-label">Kondisi</label>
                <div class="mb-3 input-group">
                    <select class="form-control" id="kondisi" name="kondisi" required>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
            </div>
            <x-adminlte-select name="space_id" label="Ruangan" placeholder="Ruangan" fgroup-class="col-md-3"
            required>
            @foreach ($spaces as $space)

                <option value={{ $space->id }}>{{ $space->nama }}</option>
            @endforeach
            </x-adminlte-select>
            <div class="col-md-3">
                <label for="gambar" class="form-label">Foto</label>
                <div class="mb-3 input-group">
                    <x-adminlte-input type="file" name="gambar" placeholder="Gambar sarpras" value=""
                    fgroup-class="col-md" disable-feedback />
                </div>
            </div>
        </div>
        <div class="row">
            <a href="{{ route('asset') }}" class="mr-auto">
                <x-adminlte-button icon="fas fa-fw fa-long-arrow-alt-left" label="Kembali" theme="secondary" type="button" class="btn-sm mt-3"/>
            </a>
            <x-adminlte-button icon="fas fa-fw fa-save" label="Tambah" theme="primary" type="submit" class="btn-sm mt-3"/>
        </div>
    </form>
</x-adminlte-card>
@stop
