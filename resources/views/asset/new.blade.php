<div class="row">
    <div class="col-md-4">
        <label for="nama" class="form-label">Nama</label>
        <div class="mb-3 input-group">
            <input type="text" class="form-control" id="nama" name="nama"  placeholder="Masukkan nama sarpras" required>
        </div>
    </div>
    <div class="col-md-4">
        <label for="nama" class="form-label">Tipe</label>
        <div class="mb-3 input-group">
            <input type="text" class="form-control" id="nama" name="nama"  placeholder="Masukkan tipe sarpras" required>
        </div>
    </div>
    <div class="col-md-4">
        <label for="nama" class="form-label">Merk</label>
        <div class="mb-3 input-group">
            <input type="text" class="form-control" id="nama" name="nama"  placeholder="Masukkan merk sarpras" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <label for="nama" class="form-label">Nomor Register</label>
        <div class="mb-3 input-group">
            <input type="text" class="form-control" id="nama" name="nama"  placeholder="Masukkan nomor register" required>
        </div>
    </div>
    <div class="col-md-4">
        <label for="harga" class="form-label">Harga</label>
        <div class="mb-3 input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Rp</div>
              </div>
            <input type="text" id="harga" class="form-control" name="harga" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Masukkan harga satuan" required>
        </div>
    </div>
    <div class="col-md-4">
        <label for="nama" class="form-label">Tahun Pembelian</label>
        <div class="mb-3 input-group">
            <input type="text" class="form-control" id="nama" name="nama"  placeholder="Masukkan tahun pembelian" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <label for="dana" class="form-label">Sumber Dana</label>
        <div class="mb-3 input-group">
            <select class="form-control" id="dana" name="dana" required>
                <option value="BOS">BOS</option>
                <option value="BOSDA">BOSDA</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <label for="kondisi" class="form-label">Kondisi</label>
        <div class="mb-3 input-group">
            <select class="form-control" id="kondisi" name="kondisi" required>
                <option value="Baik">Baik</option>
                <option value="Rusak">Rusak</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <label for="nama" class="form-label">Foto</label>
        <div class="mb-3 input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Pilih foto</label>
              </div>
        </div>
    </div>
</div>
