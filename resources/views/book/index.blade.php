@php
$heads = [['label' => 'No', 'width' => 1], 'Judul Buku', ['label' => 'Nomor ISBN/ISSN', 'width' => 15], 'Penerbit', ['label' => 'Tahun Terbit', 'width' => 14], ['label' => 'Opsi', 'width' => 17 , 'no-export' => true], 'Halaman', 'Nomor Register', 'Tahun Beli', 'Harga', 'Dana', 'Kondisi', 'Ruangan'];

$query = [];
$loop = 1;
// @dd($datas);
foreach ($datas as $data) {
    $dataId = $data->id;
    $dataNama = $data->nama;

    $btnDetail =
        '<a href=' .
        route('book.detail', $dataId) .
        '><button class="btn btn-xs btn-info mx-1 shadow-sm" title="Detail">
                <i class="fa fa-fw fa-info"></i> Detail
            </button> </a>';

    // =========== The later form is missing @method('DELETE')

    if ($data->space_id == NULL) {
            $ruangan = '-';
    } else {
            $ruangan = $data->space->nama;
    };

    $query[] = [$loop, $data->judul, $data->nomor_buku, $data->penerbit, $data->tahun_terbit, '<nobr>' . $btnDetail . '</nobr>' ,$data->pengarang, $data->penerbit, $data->tahun_terbit, $data->halaman, $data->register, $data->tahun_beli, $data->harga, $data->dana, $data->kondisi, $data->ruangan];
    // @dd($dataId);
    $loop++;
}

$config = [
    'data' => $query,
    'order' => [[0, 'asc']],
    'columns' => [['className' => 'text-center'], ['className' => 'dt-head-right'], ['className' => 'dt-head-right'], ['className' => 'dt-head-right'], ['className' => 'dt-head-right'], ['className' => 'text-center', 'orderable' => false], ["visible" => false], ["visible" => false], ["visible" => false], ["visible" => false], ["visible" => false], ["visible" => false], ["visible" => false]],
    'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'],
];
@endphp

@extends('adminlte::page')

@section('title', 'e-Sarpras | Buku')

@section('content_header')
    <h1>Buku</h1>
@stop

@section('content')
    @if (session('status'))
        <x-adminlte-alert class="bg-teal" dismissable>
            {{ session('status') }}
        </x-adminlte-alert>
    @endif
    <x-adminlte-card title="Daftar Buku" theme="success" theme-mode="outline">
        @if (auth()->user()->role !== 'Guest')
            <a href="{{ route('book.add') }}">
                <x-adminlte-button class="btn-sm mb-4" label="Tambah Buku" theme="primary" icon="fa fa-fw fa-plus"  />
            </a>
        @endif
        <x-adminlte-datatable id="table" :heads="$heads" head-theme="white" :config="$config" striped hoverable bordered />
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
