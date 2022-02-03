@php
    if ($data->space_id == NULL) {
        $ruangan = '-';
    } else {
        $ruangan = $data->space->nama;
    };
@endphp
@extends('adminlte::page')

@section('title', 'e-Sarpras | Detail Buku')

@section('content_header')
    <h1>Buku</h1>
@stop

@section('content')
    @if (session('status'))
        <x-adminlte-alert class="bg-teal" dismissable>
            {{ session('status') }}
        </x-adminlte-alert>
    @endif
    <x-adminlte-card title="Detail Buku" theme="success" theme-mode="outline">
        <div class="row">
            <div class="col-lg-4">
                <div class="mb-3 form-input">
                    <label for="" class="mb-1 fw-bold"> Gambar</label>
                    <div class="input-group">
                        <img src=" {{ asset('images/') }}/{{ $data->gambar }}" class="img-thumbnail" alt="..." height="100%"
                            width="100%">
                    </div>
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
            <x-adminlte-input type="harga" name="harga" label="Harga" placeholder="Harga" id="rupiah"
                value="{{ number_format($data->harga, 0, '.', '.') }}" fgroup-class="col-md-3" disable-feedback disabled>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <span class="fw-bold">Rp</span>
                    </div>
                </x-slot>
            </x-adminlte-input>
            <x-adminlte-select name="dana" label="Sumber Dana" placeholder="Sumber Dana" fgroup-class="col-md-2"
                disabled>
                <option value={{ $data->dana }}>{{ $data->dana }}</option>
            </x-adminlte-select>
            <x-adminlte-select name="kondisi" label="Kondisi" placeholder="Kondisi" fgroup-class="col-md-2" disabled>
                <option value={{ $data->kondisi }}>{{ $data->kondisi }}</option>
            </x-adminlte-select>

            <x-adminlte-select name="space_id" label="Ruangan" placeholder="Ruangan" fgroup-class="col-md-3" disabled>
                <option value={{ $data->space_id }}>{{ $ruangan }}</option>
            </x-adminlte-select>
        </div>
        <div class="row">
            <a href="{{ route('book') }}" class="mr-auto">
                <x-adminlte-button icon="fas fa-fw fa-long-arrow-alt-left" label="Kembali" theme="secondary" type="button"
                    class="btn-sm mt-3" />
            </a>
            <div class="opsi">
                <button class="btn btn-danger btn-sm mt-3" title="Hapus" data-toggle="modal"
                    data-target="#modalHapus_{{ $data->id }}">
                    <i class="fa fa-fw fa-trash"></i> Hapus
                </button>
                <a href="{{ route('book.edit', $data->id) }}">
                    <x-adminlte-button icon="fas fa-fw fa-edit" label="Edit" theme="success" type="button"
                        class="btn-sm mt-3" />
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
<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
@stop
