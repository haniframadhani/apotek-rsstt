<div class="container mt-3 mb-5">
  <h2>tambah obat</h2>
  <a href="<?= BASEURL ?>/home" class="">&lt; kembali</a>
  <form action="<?= BASEURL ?>/home/tambah" method="post">
    <div>
      <label class="form-label" for="nama-generik">nama generik</label>
      <input type="text" name="nama-generik" id="nama-generik" class="form-control" placeholder="nama generik">
    </div>
    <div>
      <label class="form-label" for="nama-merek">nama merek</label>
      <input type="text" name="nama-merek" id="nama-merek" class="form-control" placeholder="nama merek">
    </div>
    <div>
      <label class="form-label" for="deskripsi">deskripsi</label>
      <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="deskripsi">
    </div>
    <div>
      <label class="form-label" for="dosis">stok</label>
      <div class="input-group">
        <input type="number" name="stok" id="stok" class="form-control" min="1" placeholder="stok">
        <select class="form-select input-group" name="unit" id="unit">
          <option value="botol" selected>botol</option>
          <option value="tablet">tablet</option>
          <option value="kapsul">kapsul</option>
        </select>
      </div>
    </div>
    <div>
      <label class="form-label" for="efek-samping">efek samping</label>
      <input type="text" name="efek-samping" id="efek-samping" class="form-control" placeholder="efek samping">
    </div>
    <div>
      <label class="form-label" for="kontradiksi">kontradiksi</label>
      <input type="text" name="kontradiksi" id="kontradiksi" class="form-control" placeholder="kontradiksi">
    </div>
    <div>
      <label class="form-label" for="peringatan">peringatan</label>
      <input type="text" name="peringatan" id="peringatan" class="form-control" placeholder="peringatan">
    </div>
    <div>
      <label class="form-label" for="interaksi-obat">interaksi obat</label>
      <input type="text" name="interaksi-obat" id="interaksi-obat" class="form-control" placeholder="interaksi obat">
    </div>
    <div>
      <label class="form-label" for="produsen">produsen</label>
      <input type="text" name="produsen" id="produsen" class="form-control" placeholder="produsen">
    </div>
    <div>
      <label class="form-label" for="harga">harga</label>
      <div class="input-group has-validation">
        <span class="input-group-text">Rp.</span>
        <input type="number " name="harga" id="harga" min="1" class="form-control" placeholder="10000">
      </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">tambah obat</button>
  </form>
</div>