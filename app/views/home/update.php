<div class="container mt-3 mb-5">
  <div class="row">
    <div class="col-lg-6">
      <h2 class="text-capitalize">update obat</h2>
      <a href="<?= BASEURL ?>/home" class=""><i class="bi bi-chevron-left"></i> kembali</a>
      <form class="mt-2" action="<?= BASEURL ?>/home/ubah" method="post" novalidate>
        <input type="hidden" name="kode" id="kode" value="<?= $data['obat']['kode'] ?>">
        <div>
          <label class="form-label" for="nama_generik">nama generik</label>
          <input minlength="1" maxlength="255" type="text" name="nama_generik" id="nama_generik"
            class="<?= $data['format']['nama_generik'] ?>" placeholder="nama generik"
            value="<?= $data['obat']['nama_generik'] ?>" required>
          <div class="invalid-feedback d-block">
            <?= $data['errors']['nama_generik']; ?>
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="nama_merek">nama merek</label>
          <input minlength="1" maxlength="255" type="text" name="nama_merek" id="nama_merek"
            class="<?= $data['format']['nama_merek'] ?>" placeholder="nama merek"
            value="<?= $data['obat']['nama_merek'] ?>" required>
          <div class="invalid-feedback d-block ">
            <?= $data['errors']['nama_merek']; ?>
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="deskripsi">deskripsi</label>
          <textarea maxlength="65535" name="deskripsi" id="deskripsi" class="<?= $data['format']['deskripsi'] ?>"
            placeholder="deskripsi" required><?= $data['obat']['deskripsi'] ?></textarea>
          <div class="invalid-feedback d-block ">
            <?= $data['errors']['deskripsi']; ?>
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="stok">stok</label>
          <div class="input-group">
            <input type="number" name="stok" id="stok" class="<?= $data['format']['stok'] ?>" min="0" max="2147483647"
              placeholder="stok" value="<?= $data['obat']['stok'] ?>" required>
            <select class='<?= $data['format']['unit'] ?> input-group' name='unit' id='unit'>
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
								default:
									echo "
            <option value='botol'selected>botol</option>
            <option value='tablet'>tablet</option>
            <option value='kapsul'>kapsul</option>";
									break;
							}
							?>
            </select>
            <div class="invalid-feedback d-flex justify-content-between">
              <span><?= $data['errors']['stok']; ?></span>
              <span class="ms-auto"><?= $data['errors']['unit']; ?></span>
            </div>
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="efek_samping">efek samping</label>
          <textarea maxlength="65535" name="efek_samping" id="efek_samping"
            class="<?= $data['format']['efek_samping'] ?>" placeholder="efek samping"
            required><?= $data['obat']['efek_samping'] ?></textarea>
          <div class="invalid-feedback d-block ">
            <?= $data['errors']['efek_samping']; ?>
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="indikasi">indikasi</label>
          <textarea maxlength="65535" type="text" name="indikasi" id="indikasi"
            class="<?= $data['format']['indikasi'] ?>" placeholder="indikasi"
            required><?= $data['obat']['indikasi'] ?></textarea>
          <div class="invalid-feedback d-block ">
            <?= $data['errors']['indikasi']; ?>
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="kontradiksi">kontradiksi</label>
          <textarea maxlength="65535" type="text" name="kontradiksi" id="kontradiksi"
            class="<?= $data['format']['kontradiksi'] ?>" placeholder="kontradiksi"
            required><?= $data['obat']['kontradiksi'] ?></textarea>
          <div class="invalid-feedback d-block ">
            <?= $data['errors']['kontradiksi']; ?>
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="peringatan">peringatan</label>
          <textarea maxlength="65535" type="text" name="peringatan" id="peringatan"
            class="<?= $data['format']['peringatan'] ?>" placeholder="peringatan"
            required><?= $data['obat']['peringatan'] ?></textarea>
          <div class="invalid-feedback d-block ">
            <?= $data['errors']['peringatan']; ?>
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="interaksi_obat">interaksi obat</label>
          <textarea maxlength="65535" type="text" name="interaksi_obat" id="interaksi_obat"
            class="<?= $data['format']['interaksi_obat'] ?>" placeholder="interaksi obat"
            required><?= $data['obat']['interaksi_obat'] ?></textarea>
          <div class="invalid-feedback d-block ">
            <?= $data['errors']['interaksi_obat']; ?>
          </div>

        </div>
        <div class="mt-2">
          <label class="form-label" for="produsen">produsen</label>
          <input minlength="1" maxlength="255" type="text" name="produsen" id="produsen"
            class="<?= $data['format']['produsen'] ?>" placeholder="produsen" value="<?= $data['obat']['produsen'] ?>"
            required>
          <div class="invalid-feedback d-block ">
            <?= $data['errors']['produsen']; ?>
          </div>
        </div>
        <div class="mt-2">
          <label class="form-label" for="harga">harga</label>
          <div class="input-group has-validation">
            <span class="input-group-text">Rp.</span>
            <input type="number" name="harga" id="harga" min="0" max="2147483647"
              class="<?= $data['format']['harga'] ?>" placeholder="10000" value="<?= $data['obat']['harga'] ?>"
              required>
            <div class="invalid-feedback d-block">
              <?= $data['errors']['harga']; ?>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">update obat</button>
      </form>
    </div>
  </div>
</div>