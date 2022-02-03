@extends('adminlte::page')

@section('title', 'e-Sarpras | Beranda')

@section('content_header')
    <h1>e-Sarpras</h1>
@stop

@section('content')
    <x-adminlte-card title="Beranda" theme="success" theme-mode="outline">
        <div class="row">
            <div class="col-3">
                <x-adminlte-info-box title="Jumlah Sarpras" text="{{ $asset }}" icon="fas fa-lg fa-box" icon-theme="success"/>
            </div>
            <div class="col-3">
                <x-adminlte-info-box title="Jumlah Buku" text="{{ $book }}" icon="fas fa-lg fa-book" icon-theme="info"/>
            </div>
            <div class="col-3">
                <x-adminlte-info-box title="Jumlah Ruangan" text="{{ $space }}" icon="fas fa-lg fa-home" icon-theme="purple"/>
            </div>
            <div class="col-3">
                <a href="{{ asset('documents/Petunjuk Penggunaan e-Sarpras.pdf') }}">
                <div class="info-box">
                    <span class="info-box-icon bg-danger">
                    <i class="fas fa-lg fa-file-pdf"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Petunjuk Penggunaan</span>
                        <span class="info-box-number">Klik di sini</span>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <x-adminlte-card title="Pemberitahuan" theme="info" icon="fas fa-lg fa-bullhorn" class="mh-100" collapsible maximizable>
                    <ul>
                    @foreach ($notices as $notice)
                        <li>
                            <p>{{ $notice->isi }}</p>
                        </li>
                        @endforeach
                    </ul>
                </x-adminlte-card>
            </div>
            <div class="col-4">
                <x-adminlte-profile-widget name="{{ Auth::user()->nama }}" desc="{{ Auth::user()->role }}" theme="primary" img="{{ asset('images/') }}/{{ Auth::user()->gambar }}">
                    <x-adminlte-profile-row-item icon="fas fa-fw fa-envelope" title="e-mail" text="{{ Auth::user()->email }}" badge="info"/>
                    <x-adminlte-profile-row-item icon="fas fa-fw fa-phone" title="No. Telpon" text="{{ Auth::user()->telp }}" badge="lightblue"/>
                    <x-adminlte-profile-row-item icon="fas fa-fw fa-address-card" title="Jabatan" text="{{ Auth::user()->jabatan }}" badge="info"/>
                </x-adminlte-profile-widget>
            </div>
        </div>

    </x-adminlte-card>
@stop
