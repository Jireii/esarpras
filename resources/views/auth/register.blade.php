<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <style>
        input, select {
            display: block;
            margin-bottom: 15px;
            padding: 5px;
        }

        .is-invalid {
            border: 1px solid red;
        }

        .success {
            background-color: lightgreen;
            border: 5px solid green;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    @if (session()->has('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif
    <form action="/register" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="username">username</label>
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror">
        <label for="password">password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
        <label for="role">role</label>
        <select name="role">
            <option value="Superuser">Superuser</option>
            <option value="Administrator">Administrator</option>
            <option value="Guest">Guest</option>
        </select>
        <label for="nama">nama</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
        <label for="nik">nik</label>
        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror">
        <label for="tanggal_lahir">tanggal_lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror">
        <label for="email">email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
        <label for="telp">telp</label>
        <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror">
        <label for="alamat">alamat</label>
        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror">
        <label for="jabatan">jabatan</label>
        <select name="jabatan">
            <option value="Kepala Sekolah">Kepala Sekolah</option>
            <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
            <option value="Kepala Lab">Kepala Lab</option>
            <option value="Guru">Guru</option>
        </select>
        <label for="agama">agama</label>
        <select name="agama">
            <option value="islam">islam</option>
            <option value="buddha">buddha</option>
            <option value="kristen">kristen</option>
            <option value="katholik">katholik</option>
            <option value="hindu">hindu</option>
        </select>
        <label for="gender">gender</label>
        <select name="gender">
            <option value="laki laki">laki laki</option>
            <option value="perempuan">perempuan</option>
        </select>
        <label for="gambar">gambar</label>
        <input type="file" name="gambar">
        <button type="submit">submit</button>
    </form>
</body>
</html>