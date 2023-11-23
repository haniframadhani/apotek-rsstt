<div class="container mt-3 mb-5">
  <a href="<?= BASEURL ?>/home" class=""><i class="bi bi-chevron-left"></i> kembali</a>
  <dl class="row mt-2">
    <dt class="col-sm-2 text-capitalize">nama generik </dt>
    <dd class="col-sm-10"><?= $data['obat']['nama_generik'] ?></dd>
    <dt class="col-sm-2 text-capitalize">nama merek </dt>
    <dd class="col-sm-10"><?= $data['obat']['nama_merek'] ?></dd>
    <dt class="col-sm-2 text-capitalize">deskripsi</dt>
    <dd class="col-sm-10"><?= $data['obat']['deskripsi'] ?></dd>
    <dt class="col-sm-2 text-capitalize">stok</dt>
    <dd class="col-sm-10"><?= $data['obat']['stok'] . ' ' . $data['obat']['unit'] ?></dd>
    <dt class="col-sm-2 text-capitalize">efek samping</dt>
    <dd class="col-sm-10"><?= $data['obat']['efek_samping'] ?></dd>
    <dt class="col-sm-2 text-capitalize">indikasi</dt>
    <dd class="col-sm-10"><?= $data['obat']['indikasi'] ?></dd>
    <dt class="col-sm-2 text-capitalize">kontradiksi</dt>
    <dd class="col-sm-10"><?= $data['obat']['kontradiksi'] ?></dd>
    <dt class="col-sm-2 text-capitalize">peringatan</dt>
    <dd class="col-sm-10"><?= $data['obat']['peringatan'] ?></dd>
    <dt class="col-sm-2 text-capitalize">interaksi obat</dt>
    <dd class="col-sm-10"><?= $data['obat']['interaksi_obat'] ?></dd>
    <dt class="col-sm-2 text-capitalize">produsen</dt>
    <dd class="col-sm-10"><?= $data['obat']['produsen'] ?></dd>
    <dt class="col-sm-2 text-capitalize">harga</dt>
    <dd class="col-sm-10">Rp.<?= $data['obat']['harga'] ?></dd>
  </dl>
</div>