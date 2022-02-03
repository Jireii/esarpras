@extends('adminlte::page')

@section('title', 'e-Sarpras | Edit Pengguna')

@section('content_header')
    <h1 class="mt-4">Pengguna</h1>
@stop

@section('content')

    <x-adminlte-card theme="success" theme-mode="outline"  title="Edit Pengguna : {{ $user->nama }}">


            <form action="/users/{{ $user->id }}/edit route('user.edit'), $user->id" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <input type="hidden" name="gambar" value="{{ $user->gambar }}">
                <input type="hidden" name="passlama">
                <div class="row">
                    <div class="col-md mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control shadow-sm" name="nama" value="{{ old('nama', $user->nama) }}">
                    </div>
                    <div class="col-md mb-3">
                        <label for="">NIK</label>
                        <input type="number" class="form-control shadow-sm" name="nik" value="{{ old('nik', $user->nik) }}">
                    </div>

                      <div class="col-md mb-3">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control shadow-sm" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control shadow-sm" name="email" value="{{ old('email', $user->email) }}">
                    </div>

                    <div class="col-md mb-3">
                        <label for="">No. Telp</label>
                        <input type="number" class="form-control shadow-sm" name="telp" value="{{ old('telp', $user->telp) }}">
                    </div>

                    <div class="col-md mb-3">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control shadow-sm" name="alamat" value="{{ old('alamat', $user->alamat) }}">
                    </div>
                </div>


                @php
                    $jabatanArray = ['Kepala Sekolah' => 'Kepala Sekolah', 'Wakil Kepala Sekolah' => 'Wakil Kepala Sekolah', 'Kepala Lab' => 'Kepala Lab', 'Guru' => 'Guru'];
                    $agamaArray = ['Islam' => 'Islam', 'Buddha' => 'Buddha', 'Kristen' => 'Kristen', 'Katholik' => 'Katholik', 'Hindu' => 'Hindu'];
                    $genderArray = ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'];
                @endphp
                <div class="row">
                    <div class="col-md">
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

                    <div class="col-md">
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

                    <div class="col-md">
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

                    <div class="col-md">
                        <x-adminlte-input-file name="gambar" label="Gambar" placeholder="Pilih gambar..." />
                    </div>
                </div>

                <div class="row">
                    {{-- <div class="col-md-2 mt-3">
                        <div class="d-grid">
                            <button class="shadow-sm btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                    <div class="col-md-2 mt-3 mb-3">
                        <div class="d-grid">
                            <a href="/users/{{ $user->id }}" class="shadow-sm btn btn-secondary">Kembali</a>
                        </div>
                    </div> --}}
                    <a href="{{ route('user.detail', $user->id) }}" class="mr-auto">
                        <x-adminlte-button icon="fas fa-fw fa-long-arrow-alt-left" label="Kembali" theme="secondary" type="button" class="btn-sm mt-3"/>
                    </a>
                    <x-adminlte-button icon="fas fa-fw fa-edit" label="Perbarui" theme="success" type="submit" class="btn-sm mt-3"/>
                </div>

            </form>


    </x-adminlte-card>

@stop
