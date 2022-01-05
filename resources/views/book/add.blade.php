@extends('adminlte::page')

@section('title', 'Tambahkan Buku')

@section('content_header')
    <h1>Tambahkan Buku</h1>
@stop

@section('content')
    @if (session('status'))
        <x-adminlte-alert class="bg-teal" dismissable>
            {{ session('status') }}
        </x-adminlte-alert>
    @endif
    <x-adminlte-card title="Tambahkan Buku" theme="success" theme-mode="outline">
        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <x-adminlte-input name="judul" label="Judul" placeholder="Judul" fgroup-class="col-md-4"
                    disable-feedback required />
                <x-adminlte-input name="nomor_buku" label="Nomor ISBN/ISSN" placeholder="Nomor ISBN/ISSN"
                    fgroup-class="col-md-4" disable-feedback />
                <x-adminlte-input name="register" label="Nomor Register" placeholder="Nomor Register"
                    fgroup-class="col-md-4" disable-feedback />
                <x-adminlte-input name="pengarang" label="Pengarang" placeholder="Pengarang" fgroup-class="col-md-4"
                    disable-feedback required />
                <x-adminlte-input name="penerbit" label="Penerbit" placeholder="Penerbit" fgroup-class="col-md-4"
                    disable-feedback required />
                <x-adminlte-input type="number" name="tahun_terbit" label="Tahun Terbit" placeholder="Tahun Terbit"
                    fgroup-class="col-md-2" disable-feedback required/>
                <x-adminlte-input type="number" name="tahun_beli" label="Tahun Pembelian" placeholder="Tahun Pembelian"
                    fgroup-class="col-md-2" disable-feedback />
                <x-adminlte-input type="number" name="halaman" label="Jumlah Halaman" placeholder="Jumlah Halaman"
                    fgroup-class="col-md-2" disable-feedback />
                <x-adminlte-input type="number" name="harga" label="Harga Buku" placeholder="Harga Buku"
                    fgroup-class="col-md-4" disable-feedback required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <span class="fw-bold">Rp</span>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select name="dana" label="Sumber Dana" placeholder="Sumber Dana" fgroup-class="col-md-1"
                    required>
                    <option value="BOS">BOS</option>
                    <option value="BOSDA">BOSDA</option>
                </x-adminlte-select>
                <x-adminlte-select name="kondisi" label="Kondisi" placeholder="Kondisi" fgroup-class="col-md-1"
                    required>
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>

                </x-adminlte-select>

                <x-adminlte-select name="space_id" label="Ruangan" placeholder="Ruangan" fgroup-class="col-md-4"
                    required>
                    @foreach ($spaces as $space)

                        <option value={{ $space->id }}>{{ $space->nama }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-input type="file" name="gambar" label="Gambar Buku" placeholder="Gambar Buku" value=""
                    fgroup-class="col-md" disable-feedback />
            </div>
            <div class="row mt-3">
                <div class="col-lg-8">
                    <x-adminlte-button class="btn" type="submit" label=" Tambahkan" theme="success"
                        icon="fas fa-lg fa-save" />
                    <a href="{{ route('book') }}">
                        <button class="btn btn-secondary" type="button">
                            <i class="fas fa-lg fa-arrow-left"></i>
                            Kembali
                        </button>
                    </a>
                </div>
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
