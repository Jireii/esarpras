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
                    fgroup-class="col-md-2" disable-feedback required />
                <x-adminlte-input type="number" name="tahun_beli" label="Tahun Pembelian" placeholder="Tahun Pembelian"
                    fgroup-class="col-md-2" disable-feedback />
                <x-adminlte-input type="number" name="halaman" label="Jumlah Halaman" placeholder="Jumlah Halaman"
                    fgroup-class="col-md-2" disable-feedback />
                <x-adminlte-input type="text" name="harga" label="Harga Buku" placeholder="Harga Buku" id="rupiah"
                    fgroup-class="col-md-3" disable-feedback required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <span class="fw-bold">Rp</span>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select name="dana" label="Sumber Dana" placeholder="Sumber Dana" fgroup-class="col-md-2"
                    required>
                    <option value="BOS">BOS</option>
                    <option value="BOSDA">BOSDA</option>
                </x-adminlte-select>
                <x-adminlte-select name="kondisi" label="Kondisi" placeholder="Kondisi" fgroup-class="col-md-2"
                    required>
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>

                </x-adminlte-select>

                <x-adminlte-select name="space_id" label="Ruangan" placeholder="Ruangan" fgroup-class="col-md-3"
                    required>
                    @foreach ($spaces as $space)
                        <option value={{ $space->id }}>{{ $space->nama }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-input type="file" name="gambar" label="Gambar Buku" placeholder="Gambar Buku" value=""
                    fgroup-class="col-md" disable-feedback />
            </div>
            <div class="row">
                <a href="{{ route('book') }}" class="mr-auto">
                    <x-adminlte-button icon="fas fa-fw fa-long-arrow-alt-left" label="Kembali" theme="secondary"
                        type="button" class="btn-sm mt-3" />
                </a>
                <x-adminlte-button icon="fas fa-fw fa-save" label="Tambah" theme="primary" type="submit"
                    class="btn-sm mt-3" />
            </div>
        </form>
    </x-adminlte-card>
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
