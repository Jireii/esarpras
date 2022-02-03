@extends('adminlte::page')

@section('title', 'e-Sarpras | Sarpras')

@section('content_header')
    <h1>Sarpras</h1>
@stop

@php
$heads = [
    ['label' => 'No', 'width' => 1],
    'Nama',
    'Merk',
    'Tipe',
    'Nomor Register',
    'Harga Satuan',
    'Tahun Pembelian',
    'Dana',
    'Kondisi',
    'Ruangan',
    ['label' => 'Opsi', 'no-export' => true, 'width' => 5],
];
$query = [];
$loop = 1;
foreach ($datas as $data) {
    if ($data->space_id == NULL) {
        $ruangan = '-';
    } else {
        $ruangan = $data->space->nama;
    };

    $btnDetail =
        '<a href=' .
        route('asset.detail', $data->id) .
        '><button class="btn btn-xs btn-info mx-1 shadow-sm" title="Detail">
                <i class="fa fa-fw fa-info"></i> Detail
            </button>';
    $query[]=[
        $loop,
        $data->nama,
        $data->merk,
        $data->tipe,
        $data->register,
        $data->harga, //invisible
        $data->tahun_beli, //invisible
        $data->dana, //invisible
        $data->kondisi,
        $ruangan, //invisible
        '<nobr>'.$btnDetail.'</nobr>',
    ];
    $loop++;
}
$config = [
    'data' => $query,
    'order' => [[0, 'asc']],
    // 'columns' => [['className' => 'align-middle'], null, null, null, null, null, ['className' => 'text-center'], ['className' => 'text-center'], ['className' => 'text-center d-none'], ['orderable' => false, 'className' => 'text-center']],
    'columns' => [['className' => 'text-center'], null, null, null, null, ['visible' => false], ['className' => 'text-center', 'visible' => false], ['className' => 'text-center', 'visible' => false], ['className' => 'text-center'], ['className' => 'text-center', 'visible' => false], ['orderable' => false, 'className' => 'text-center']],
    'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'],
];
@endphp

@section('content')
    @if (session('status'))
        <x-adminlte-alert class="bg-teal" dismissable>
            {{ session('status') }}
        </x-adminlte-alert>
    @endif
    <x-adminlte-card title="Daftar Sarpras" theme="green" theme-mode="outline">
        <a href="{{ route('asset.add') }}">
            <x-adminlte-button icon="fas fa-fw fa-plus" label="Tambah Sarpras" theme="primary" type="button" class="btn-sm mb-3"/>
        </a>
        <x-adminlte-datatable id="table" :heads="$heads" head-theme="white" :config="$config" striped hoverable bordered with-buttons/>

    </x-adminlte-card>
@stop

@section('js')
    <script>
    // $('#table').dataTable();

    $('#table').on( 'column-visibility.dt', function ( e, settings, column, state ) {
        console.log(
            'Column '+ column +' has changed to '+ (state ? 'visible' : 'hidden')
        );
    } );
    </script>
@stop
