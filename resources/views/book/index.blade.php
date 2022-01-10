@php
$heads = [['label' => 'No', 'width' => 1], 'Judul Buku', ['label' => 'Nomor ISBN/ISSN', 'width' => 15], 'Penerbit', ['label' => 'Tahun Terbit', 'width' => 14], ['label' => 'Opsi', 'width' => 17]];

$query = [];
$loop = 1;
// @dd($datas);
foreach ($datas as $data) {
    $dataId = $data->id;
    $dataNama = $data->nama;

    $btnDelete =
        '<button class="btn btn-xs btn-danger mx-1 shadow-sm" title="Hapus" data-toggle="modal" data-target="#modalHapus_' .
        $dataId .
        '">
                  <i class="fa fa-fw fa-trash"></i> Hapus
              </button>';

    $btnEdit =
        '<a href=' .
        route('book.edit', $dataId) .
        '><button class="btn btn-xs btn-success mx-1 shadow-sm" title="Edit">
                <i class="fa fa-fw fa-pen"></i> Sunting
            </button>
            </a>';

    $btnDetail =
        '<a href=' .
        route('book.detail', $dataId) .
        '><button class="btn btn-xs btn-info mx-1 shadow-sm" title="Detail">
                <i class="fa fa-fw fa-info"></i> Detail
            </button> </a>';

    $mdlDelete =
        '<div class="modal fade" id="modalHapus_' .
        $dataId .
        '" tabindex="-1" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus ' .
        $dataNama .
        '?
                </div>
                <div class="modal-footer">
                    <form action="' .
        route('space.destroy', $dataId) .
        '" method="POST">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="_token" value="' .
        csrf_token() .
        '" />
                        <button type="button" class="mr-auto px-3 py-1 btn btn-secondary btn-sm"
                            data-bs-dismiss="modal" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="px-3 py-1 btn btn-danger btn-sm">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>';

    // =========== The later form is missing @method('DELETE')

    $query[] = [$loop, 
    $data->judul, 
    $data->nomor_buku, 
    $data->penerbit, $data->tahun_terbit, 
    '<nobr>' . $btnDetail . $btnEdit . $btnDelete . '</nobr>',        $data->pengarang ,
        $data->penerbit ,
        $data->tahun_terbit ,
        $data->halaman ,
        $data->register ,
        $data->tahun_beli ,
        $data->harga ,
        $data->dana ,
        $data->kondisi ,
        $data->space_id ,
];
    echo $mdlDelete;
    // @dd($dataId);
    $loop++;
}

$config = [
    'data' => $query,
    'order' => [[0, 'asc']],
    'columns' => [
        ['className' => 'text-center'], 
        ['className' => 'dt-head-right'], 
        ['className' => 'dt-head-right'], 
        ['className' => 'dt-head-right'], 
        ['className' => 'dt-head-right'], 
        ['className' => 'text-center', 'orderable' => false]
    ],
    'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'],
];
@endphp

@extends('adminlte::page')

@section('title', 'Buku')

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
        <a href="{{ route('book.add') }}">
            <x-adminlte-button class="btn-sm mb-4" label="Tambah Buku" theme="primary" icon="fa fa-fw fa-plus" />
        </a>
        <x-adminlte-datatable id="table" :heads="$heads" head-theme="white" :config="$config" striped hoverable bordered with-buttons/>
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
