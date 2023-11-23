<div class="container mt-3 mb-5">
  <div class="row">
    <div class="col-lg-6">
      <h2 class="text-capitalize">update obat</h2>
      <a href="<?= BASEURL ?>/home" class=""><i class="bi bi-chevron-left"></i> kembali</a>
      <form class="mt-2 needs-validation" action="<?= BASEURL ?>/home/ubah" method="post" novalidate>
        <input type="hidden" name="kode" id="kode" value="<?= $data['obat']['kode'] ?>">
        <div>
          <label class="form-label" for="nama-generik">nama generik</label>
          <input minlength="1" maxlength="255" type="text" name="nama-generik" id="nama-generik" class="form-control" placeholder="nama generik" value="<?= $data['obat']['nama_generik'] ?>" required>
          <div class="invalid-feedback">
            Wajib diisi
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="nama-merek">nama merek</label>
          <input minlength="1" maxlength="255" type="text" name="nama-merek" id="nama-merek" class="form-control" placeholder="nama merek" value="<?= $data['obat']['nama_merek'] ?>" required>
          <div class="invalid-feedback">
            Wajib diisi
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="deskripsi">deskripsi</label>
          <textarea maxlength="65535" name="deskripsi" id="deskripsi" class="form-control" placeholder="deskripsi" required><?= $data['obat']['deskripsi'] ?></textarea>
          <div class="invalid-feedback">
            Wajib diisi
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="dosis">stok</label>
          <div class="input-group">
            <input type="number" name="stok" id="stok" class="form-control" min="0" max="2147483647" placeholder="stok" value="<?= $data['obat']['stok'] ?>" required>
            <select class='form-select input-group' name='unit' id='unit'>
              <?php
              switch ($data['obat']['unit']) {
                case "botol":
                  echo "
              <option value='botol' selected>botol</option>
              <option value='tablet'>tablet</option>
              <option value='kapsul'>kapsul</option>";
                  break;
                case "tablet":
                  echo "
              <option value='botol'>botol</option>
              <option value='tablet' selected>tablet</option>
              <option value='kapsul'>kapsul</option>";
                  break;
                case "kapsul":
                  echo "
              <option value='botol'>botol</option>
              <option value='tablet'>tablet</option>
              <option value='kapsul' selected>kapsul</option>";
                  break;
              }
              ?>
            </select>
            <div class="invalid-feedback">
              Wajib diisi
            </div>
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="efek-samping">efek samping</label>
          <textarea maxlength="65535" name="efek-samping" id="efek-samping" class="form-control" placeholder="efek samping" required><?= $data['obat']['efek_samping'] ?></textarea>
          <div class="invalid-feedback">
            Wajib diisi
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="indikasi">indikasi</label>
          <textarea maxlength="65535" type="text" name="indikasi" id="indikasi" class="form-control" placeholder="indikasi" required><?= $data['obat']['indikasi'] ?></textarea>
          <div class="invalid-feedback">
            Wajib diisi
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="kontradiksi">kontradiksi</label>
          <textarea maxlength="65535" type="text" name="kontradiksi" id="kontradiksi" class="form-control" placeholder="kontradiksi" required><?= $data['obat']['kontradiksi'] ?></textarea>
          <div class="invalid-feedback">
            Wajib diisi
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="peringatan">peringatan</label>
          <textarea maxlength="65535" type="text" name="peringatan" id="peringatan" class="form-control" placeholder="peringatan" required><?= $data['obat']['peringatan'] ?></textarea>
          <div class="invalid-feedback">
            Wajib diisi
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="interaksi-obat">interaksi obat</label>
          <textarea maxlength="65535" type="text" name="interaksi-obat" id="interaksi-obat" class="form-control" placeholder="interaksi obat" required><?= $data['obat']['interaksi_obat'] ?></textarea>
          <div class="invalid-feedback">
            Wajib diisi
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="produsen">produsen</label>
          <input minlength="1" maxlength="255" type="text" name="produsen" id="produsen" class="form-control" placeholder="produsen" value="<?= $data['obat']['produsen'] ?>" required>
          <div class="invalid-feedback">
            Wajib diisi
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="harga">harga</label>
          <div class="input-group has-validation">
            <span class="input-group-text">Rp.</span>
            <input type="number" name="harga" id="harga" min="0" max="2147483647" class="form-control" placeholder="10000" value="<?= $data['obat']['harga'] ?>" required>
          </div>
          <div class="invalid-feedback">
            Wajib diisi
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">update obat</button>
      </form>
    </div>
  </div>
</div>

<script>
  (() => {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>