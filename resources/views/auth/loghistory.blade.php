@extends('adminlte::page')

@section('title', 'User Log History')
    
@section('content_header')
    <h1>User Log History</h1>
@stop

@php
    $heads = [
        ['label' => 'No', 'width' => 1],
        'Nama',
        'Alamat IP',
        'Device',
        'Terakhir Login',
    ];

    $x = 1;
    $query = [];
    foreach ($datas as $key => $data) {
        $dataId = $data->id;
        $dataNama = $data->log->nama;
        
        $query[] = [$x, $dataNama, $data->ip, $data->device, $data->last_login];
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
            ['orderable' => false, 'className' => 'text-center']],
        'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'],
    ];
    @endphp
@section('content')

    <x-adminlte-card theme="success" theme-mode="outline">
        <x-adminlte-datatable id="table1" :heads="$heads" head-theme="white" :config="$config" striped hoverable bordered />
    </x-adminlte-card>

@stop