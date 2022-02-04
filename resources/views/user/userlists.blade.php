@extends('adminlte::page')

@section('title', 'e-Sarpras | Pengguna')

@section('content_header')
    <h1>Pengguna</h1>
@stop

@php
    $heads = [
        ['label' => 'No', 'width' => 1],
        'Nama',
        'NIK',
        'Jabatan',
        'Role',
        'Terakhir Login',
        'IP Login Terakhir',
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

        $query[] = [$x, $user->nama, $user->nik, $user->jabatan, $user->role, $user->last_login_at, $user->last_login_ip, '<nobr>' . $btnDetail . '</nobr>'];
        $x++;
        // var_dump($modalHapus);die;
    }
    $config = [
        'data' => $query,
        'order' => [[0, 'asc']],
        'columns' => [
            ['className' => 'text-center'],
            ['className' => 'text-center'],
            ['className' => 'text-center'],
            ['className' => 'text-center'],
            ['className' => 'text-center'],
            ['className' => 'text-center'],
            ['className' => 'text-center'],
            ['orderable' => false, 'className' => 'text-center']],
        'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'],
    ];
    @endphp
@section('content')

    <x-adminlte-card theme="success" theme-mode="outline" title="Daftar Pengguna">
        <a href="{{ route('register') }}">
            <x-adminlte-button class="btn-sm mb-4" label="Tambah Pengguna" theme="primary" icon="fa fa-fw fa-plus"  />
        </a>
        <x-adminlte-datatable id="table1" :heads="$heads" head-theme="white" :config="$config" striped hoverable bordered />
    </x-adminlte-card>

@stop
