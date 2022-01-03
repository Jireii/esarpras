@php
$heads = [
    ['label' => 'No', 'width' => 1],
    'Nama',
    ['label' => 'Opsi', 'no-export' => true, 'width' => 5],
];

$query = [];
$loop = 1;
// @dd($datas);
foreach ($datas as $data) {
    $dataId = $data->id;
    $dataNama = $data->nama;

    $btnEdit = '<button class="btn btn-xs btn-success mx-1 shadow-sm" title="Edit" data-toggle="modal" data-target="#modalSunting_'.$dataId.'">
                <i class="fa fa-fw fa-pen"></i> Sunting
            </button>';
    $btnDelete = '<button class="btn btn-xs btn-danger mx-1 shadow-sm" title="Hapus" data-toggle="modal" data-target="#modalHapus_'.$dataId.'">
                  <i class="fa fa-fw fa-trash"></i> Hapus
              </button>';

    $mdlEdit = '<div class="modal fade" id="modalSunting_'.$dataId.'" tabindex="-1" aria-labelledby="modalSuntingLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSuntingLabel">Sunting Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="'.route("space.edit", $dataId).'" method="POST">
                    <input type="hidden" name="_token" value="'.csrf_token().'" />
                    <label for="nama" class="form-label">Nama</label>
                    <div class="mb-3 input-group">
                        <input type="text" class="form-control" id="nama" name="nama" value="'.$dataNama.'" placeholder="Masukkan nama ruangan" required>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="mr-auto px-3 py-1 btn btn-secondary btn-sm"
                            data-bs-dismiss="modal" data-dismiss="modal">Batal</button>
                        <button type="submit" class="px-3 py-1 btn btn-success btn-sm">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>';
    $mdlDelete = '<div class="modal fade" id="modalHapus_'.$dataId.'" tabindex="-1" aria-labelledby="deleteModalLabel"
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
                    Apakah anda yakin ingin menghapus '.$dataNama.'?
                </div>
                <div class="modal-footer">
                    <form action="'.route("space.destroy", $dataId).'" method="POST">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="_token" value="'.csrf_token().'" />
                        <button type="button" class="mr-auto px-3 py-1 btn btn-secondary btn-sm"
                            data-bs-dismiss="modal" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="px-3 py-1 btn btn-danger btn-sm">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>';

    // =========== The later form is missing @method('DELETE')

    $query[]=[
        $loop,
        // @dd($loop),
        $data->nama,
        '<nobr>'.$btnEdit.$btnDelete.'</nobr>',
    ];
    echo($mdlEdit);
    echo($mdlDelete);
    // @dd($dataId);
    $loop++;
}

$config = [
    'data' => $query,
    'order' => [[0, 'asc']],
    'columns' => [['className' => 'text-center'], ['className' => 'dt-head-right'], ['orderable' => false, 'className' => 'text-center']],
    'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'],
];
@endphp

@extends('adminlte::page')

@section('title', 'Ruangan')

@section('content_header')
    <h1>Ruangan</h1>
@stop

@section('content')
    @if (session('status'))
        <x-adminlte-alert class="bg-teal" dismissable>
            {{ session('status') }}
        </x-adminlte-alert>
    @endif
    <x-adminlte-card title="Daftar Ruangan" theme="success" theme-mode="outline">
        <x-adminlte-button class="btn-sm mb-4" label="Tambah Ruangan" theme="primary" icon="fa fa-fw fa-plus" data-toggle="modal" data-target="#modalTambah" type="button"/>
        <x-adminlte-datatable id="table" :heads="$heads" head-theme="white" :config="$config"
    striped hoverable bordered/>
    </x-adminlte-card>

    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSuntingLabel">Tambah Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('space.store') }}" method="POST">
                    @csrf
                    <label for="nama" class="form-label">Nama</label>
                    <div class="mb-3 input-group">
                        <input type="text" class="form-control" id="nama" name="nama"  placeholder="Masukkan nama ruangan" required>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="mr-auto px-3 py-1 btn btn-secondary btn-sm"
                            data-bs-dismiss="modal" data-dismiss="modal">Batal</button>
                        <button type="submit" class="px-3 py-1 btn btn-primary btn-sm">Tambah</button>
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
    <script> console.log('Hi!'); </script>
@stop
