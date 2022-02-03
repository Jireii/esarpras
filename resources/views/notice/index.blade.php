@extends('adminlte::page')

@section('title', 'e-Sarpras | Pemberitahuan')

@section('content_header')
    <h1>Pemberitahuan</h1>
@stop

@php
$heads = [
    ['label' => 'No', 'width' => 1],
    'Oleh',
    'Isi',
    ['label' => 'Opsi', 'no-export' => true, 'width' => 5],
];
$query = [];
$loop = 1;
foreach ($datas as $data) {
    $dataId = $data->id;
    $dataIsi = $data->isi;
    $btnEdit = '<button class="btn btn-xs btn-success mx-1 shadow-sm" title="Edit" data-toggle="modal" data-target="#modalSunting_'.$dataId.'">
                <i class="fa fa-fw fa-pen"></i> Edit
            </button>';
    $btnDelete = '<button class="btn btn-xs btn-danger mx-1 shadow-sm" title="Hapus" data-toggle="modal" data-target="#modalHapus_'.$dataId.'">
                  <i class="fa fa-fw fa-trash"></i> Hapus
              </button>';
    $mdlEdit = '<div class="modal fade" id="modalSunting_'.$dataId.'" tabindex="-1" aria-labelledby="modalSuntingLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSuntingLabel">Edit Pemberitahuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="'.route("notice.edit", $dataId).'" method="POST">
                    <input type="hidden" name="_token" value="'.csrf_token().'" />
                    <label for="isi" class="form-label">Isi Pemberitahuan</label>
                    <div class="mb-3 input-group">
                        <textarea type="text" class="form-control" id="isi" name="isi" placeholder="Masukkan isi pemberitahuan" required>'.$dataIsi.'</textarea>
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
                    Apakah anda yakin ingin menghapus '.$dataIsi.'?
                </div>
                <div class="modal-footer">
                    <form action="'.route("notice.destroy", $dataId).'" method="POST">
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

    if ($data->user_id == NULL) {
            $oleh = '-';
    } else {
            $oleh = $data->user->nama;
    };

    $query[]=[
        $loop,
        // @dd($loop),
        $oleh,
        $data->isi,
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
    'columns' => [['className' => 'text-center'], ['className' => 'text-center'], ['className' => 'dt-head-right'], ['orderable' => false, 'className' => 'text-center']],
    'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'],
];
@endphp

@section('content')
    @if (session('status'))
        <x-adminlte-alert class="bg-teal" dismissable>
            {{ session('status') }}
        </x-adminlte-alert>
    @endif
    <x-adminlte-card title="Daftar Pemberitahuan" theme="green" theme-mode="outline">
        <x-adminlte-button icon="fas fa-fw fa-plus" label="Tambah Pemberitahuan" theme="success" type="button" class="btn-sm mb-3" data-toggle="modal" data-target="#modalTambah"/>
        <x-adminlte-datatable id="table" :heads="$heads" head-theme="white" :config="$config" striped hoverable bordered/>

    </x-adminlte-card>

    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSuntingLabel">Tambah Pemberitahuan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('notice.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <label for="isi" class="form-label">Isi Pemberitahuan</label>
                    <div class="mb-3 input-group">
                        <textarea class="form-control" id="isi" name="isi" placeholder="Masukkan isi pemberitahuan" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="mr-auto px-3 py-1 btn btn-secondary btn-sm" data-bs-dismiss="modal" data-dismiss="modal" type="button">Batal</button>
                    <button class="px-3 py-1 btn btn-primary btn-sm" type="submit">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop
