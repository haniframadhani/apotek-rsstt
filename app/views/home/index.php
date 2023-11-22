<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h1 class="text-capitalize">daftar obat</h1>
      <a href="<?= BASEURL ?>/home/tambahObat">tambah obat</a>
      <?php if (!empty($data['obat'])) : ?>
      <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>kode obat</th>
              <th>nama generik</th>
              <th>nama merek</th>
              <th>deskripsi</th>
              <th>stok</th>
              <th>efek samping</th>
              <th>indikasi</th>
              <th>kontradiksi</th>
              <th>peringatan</th>
              <th>interaksi obat</th>
              <th>produsen</th>
              <th>harga</th>
              <th>aksi</th>
            </tr>
          </thead>
          <tbody class="">
            <?php foreach ($data['obat'] as $obat) : ?>
            <tr>
              <td><?= $obat['kode'] ?></td>
              <td><?= $obat['nama_generik'] ?></td>
              <td><?= $obat['nama_merek'] ?></td>
              <td class="text-break"><?= $obat['deskripsi'] ?></td>
              <td><?= $obat['stok'] . ' ' . $obat['unit'] ?></td>
              <td class="text-break"><?= $obat['efek_samping'] ?></td>
              <td class="text-break"><?= $obat['indikasi'] ?></td>
              <td class="text-break"><?= $obat['kontradiksi'] ?></td>
              <td class="text-break"><?= $obat['peringatan'] ?></td>
              <td class="text-break"><?= $obat['interaksi_obat'] ?></td>
              <td><?= $obat['produsen'] ?></td>
              <td>Rp.<?= $obat['harga'] ?></td>
              <td><a href="<?= BASEURL ?>/home/hapus/<?= $obat['kode']; ?>" class="btn btn-danger"
                  onclick="return confirm('yakin?')">hapus</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <?php else : ?>
      <h2>obat kosong</h2>
      <?php endif; ?>
    </div>
  </div>
</div>