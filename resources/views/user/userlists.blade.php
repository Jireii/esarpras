@extends('adminlte::page')

@section('title', 'User List')
    
@section('content_header')
    <h1>User List</h1>
@stop

@php
    $heads = [
        ['label' => 'No', 'width' => 1],
        'Nama',
        'NIK',
        'Jabatan',
        'Role',
        ['label' => 'Opsi', 'no-export' => true, 'width' => 5],
    ];

    $x = 1;
    $query = [];
    foreach ($users as $key => $user) {
        $dataId = $user->id;
        $dataNama = $user->nama;

        $btnDetail = '<a href="' .
        route('user.detail', $dataId) .
        '"><button class="btn btn-xs btn-info mx-1 shadow-sm" title="Detail">
            <i class="fa fa-fw fa-info"></i> Detail
            </button></a>';
        
        $btnDelete = '<button type="button" class="btn btn-xs btn-danger mx-1 shadow-sm" data-toggle="modal" data-target="#hapus_' . $dataId . '" title="Delete">
                <i class="fa fa-fw fa-trash"></i> Hapus
                </button>';

        $modalHapus = "
        <div class='modal fade' id='hapus_$dataId' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='false'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Hapus User</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        Apakah anda yakin untuk menghapus user $dataNama
                    </div>
                    <div class='modal-footer'>
                        <form action='" . route('user.delete', $dataId) . "' method='POST'>
                            <input type='hidden' name='_method' value='DELETE' />
                            <input type='hidden' name='_token' value='" . csrf_token() . "' />
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                            
                            <button type='submit' class='btn btn-primary'>Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>";

        $query[] = [$x, $user->nama, $user->nik, $user->jabatan, $user->role, '<nobr>' . $btnDetail . $btnDelete . '</nobr>'];
        $x++;
        echo $modalHapus;
        // var_dump($modalHapus);die;
    }
    $config = [
        'data' => $query,
        'order' => [[0, 'asc']],
        'columns' => [['className' => 'text-center'], ['className' => 'text-center'], ['className' => 'text-center'],  ['className' => 'dt-head-right'], ['className' => 'dt-head-right'], ['orderable' => false, 'className' => 'text-center']],
        'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'],
    ];
    @endphp
@section('content')

    <x-adminlte-card theme="success" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" head-theme="white" :config="$config" striped hoverable bordered />
    </x-adminlte-card>

@stop