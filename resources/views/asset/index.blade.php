@extends('adminlte::page')

@section('title', 'e-Sarpras - Sarpras')

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
    $btnEdit = '<button class="btn btn-xs btn-success mx-1 shadow-sm" title="Edit" data-toggle="modal" data-target="#modalSunting_'.$data->id.'">
                <i class="fa fa-fw fa-pen"></i> Sunting
            </button>';
    $btnDelete = '<button class="btn btn-xs btn-danger mx-1 shadow-sm" title="Hapus" data-toggle="modal" data-target="#modalHapus_'.$data->id.'">
                  <i class="fa fa-fw fa-trash"></i> Hapus
              </button>';
    $mdlDelete = '<div class="modal fade" id="modalHapus_'.$data->id.'" tabindex="-1" aria-labelledby="deleteModalLabel"
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
                    Apakah anda yakin ingin menghapus '.$data->nama.'?
                </div>
                <div class="modal-footer">
                    <form action="'.route("space.destroy", $data->id).'" method="POST">
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
        $data->space->nama, //invisible
        '<nobr>'.$btnEdit.$btnDelete.'</nobr>',
    ];
    // echo($mdlEdit);
    // echo($mdlDelete);
    // @dd($dataId);
    $loop++;
}
$config = [
    'data' => $query,
    'order' => [[0, 'asc']],
    // 'columns' => [['className' => 'align-middle'], null, null, null, null, null, ['className' => 'text-center'], ['className' => 'text-center'], ['className' => 'text-center d-none'], ['orderable' => false, 'className' => 'text-center']],
    'columns' => [['className' => 'text-center'], null, null, null, null, null, ['className' => 'text-center'], ['className' => 'text-center'], ['className' => 'text-center'], ['className' => 'text-center'], ['orderable' => false, 'className' => 'text-center']],
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
        {{-- <x-adminlte-button icon="fas fa-fw fa-plus" label="Tambah Sarpras" theme="success" type="button" class="btn-sm mb-3" data-toggle="modal" data-target="#modalTambah"/> --}}
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
