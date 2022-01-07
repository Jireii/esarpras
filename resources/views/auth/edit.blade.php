@extends('adminlte::page')

@section('title', 'Edit')
    
@section('content_header')
    <h1 class="mt-4">Edit Profile</h1>
@stop

@section('content')

    @if (session()->has('failed'))
        <x-adminlte-alert theme="danger" title="Success" dismissable>
            {{ session('failed') }}
        </x-adminlte-alert>
    @endif
    
    <x-adminlte-card theme="success" theme-mode="outline">
        <main>
            <div class="container-fluid">
        
            <form action="/pengguna/{{ $user->id }}/edit" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <input type="hidden" name="gambar" value="{{ $user->gambar }}">
                <div class="row">
                    <div class="col-md mt-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control shadow-sm" name="nama" value="{{ old('nama', $user->nama) }}">
                    </div>
                    <div class="col-md mt-3">
                        <label for="">NIK</label>
                        <input type="number" class="form-control shadow-sm" name="nik" value="{{ old('nik', $user->nik) }}">
                    </div>
        
                      <div class="col-md mt-3">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control shadow-sm" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md mt-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control shadow-sm" name="email" value="{{ old('email', $user->email) }}">
                    </div>
        
                    <div class="col-md mt-3">
                        <label for="">No. Telp</label>
                        <input type="number" class="form-control shadow-sm" name="telp" value="{{ old('telp', $user->telp) }}">
                    </div>
        
                    <div class="col-md mt-3">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control shadow-sm" name="alamat" value="{{ old('alamat', $user->alamat) }}">
                    </div>
                </div> 
        
        
                @php
                    $jabatanArray = ['Kepala Sekolah' => 'Kepala Sekolah', 'Wakil Kepala Sekolah' => 'Wakil Kepala Sekolah', 'Kepala Lab' => 'Kepala Lab', 'Guru' => 'Guru'];
                    $agamaArray = ['Islam' => 'Islam', 'Buddha' => 'Buddha', 'Kristen' => 'Kristen', 'Katholik' => 'Katholik', 'Hindu' => 'Hindu'];
                    $genderArray = ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'];
                @endphp
                <div class="row mb-3">
                    <div class="col-md mt-3">
                        <label for="">Jabatan</label>
                        <select name="jabatan" class="custom-select shadow-sm">
                            @foreach ($jabatanArray as $item)
                                @if (old('jabatan', $user->jabatan) == $item)
                                    <option value="{{ $user->jabatan }}" selected>{{ $user->jabatan }}</option>
                                @else
                                    <option value="{{ $item }}">{{ $item }}</option>    
                                @endif
                            @endforeach
                        </select>
                   </div>
        
                    <div class="col-md mt-3">
                        <label for="kondisiBuku">Agama</label>
                        <select name="agama" id="" class="custom-select shadow-sm">
                            @foreach ($agamaArray as $item)
                                @if (old('agama', $user->agama) == $item)
                                    <option value="{{ $user->agama }}" selected>{{ $user->agama }}</option>
                                @else
                                    <option value="{{ $item }}">{{ $item }}</option>    
                                @endif
                            @endforeach
                        </select>
                    </div>
        
                    <div class="col-md mt-3">
                        <label for="">Jenis Kelamin</label>
                        <select name="gender" id="" class="custom-select shadow-sm">
                            @foreach ($genderArray as $item)
                                @if (old('gender', $user->gender) == $item)
                                    <option value="{{ $user->gender }}" selected>{{ $user->gender }}</option>
                                @else
                                    <option value="{{ $item }}">{{ $item }}</option>    
                                @endif
                            @endforeach
                        </select>
                    </div>
        
                    <div class="col-md mt-3">
                        <x-adminlte-input-file name="gambar" label="Gambar" placeholder="Pilih gambar..." />      
                    </div> 
                </div>

                <div class="row mt-4">
                    <div class="col-md">
                        <h4>Ubah Kata Sandi</h4>
                    </div>
                </div>
        
                <div class="row mb-5">
                    <div class="col-md mt-1">
                        <label>Sandi lama</label>
                        <input type="password" class="form-control shadow-sm" name="passlama">
                    </div>
        
                    <div class="col-md mt-1">
                        <label>Sandi baru</label>
                        <input type="password" class="form-control shadow-sm" name="passbaru1">
                    </div>
        
                    <div class="col-md mt-1">
                        <label>Konfirmasi sandi baru</label>
                        <input type="password" class="form-control shadow-sm" name="passbaru2">
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md-2 mt-3">
                        <div class="d-grid">
                            <button class="shadow-sm btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                    <div class="col-md-2 mt-3 mb-3">
                        <div class="d-grid">
                            <a href="/pengguna" class="shadow-sm btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
        
            </form>
        
            </div>
        </main>
    </x-adminlte-card>

@stop