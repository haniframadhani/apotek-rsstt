<div class="container-fluid">
  <?php Flasher::flash(); ?>
  <a href="<?= BASEURL ?>/home/tambahObat">tambah obat</a>
  <?php if (!empty($data['obat'])) : ?>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class="table-light">
          <tr>
            <th scope="col">kode obat</th>
            <th scope="col">nama generik</th>
            <th scope="col">nama merek</th>
            <th scope="col">deskripsi</th>
            <th scope="col">stok</th>
            <th scope="col">efek samping</th>
            <th scope="col">kontradiksi</th>
            <th scope="col">peringatan</th>
            <th scope="col">interaksi obat</th>
            <th scope="col">produsen</th>
            <th scope="col">harga</th>
          </tr>
        </thead>
        <tbody class="">
          <?php foreach ($data['obat'] as $obat) : ?>
            <tr>
              <td><?= $obat['kode'] ?></td>
              <td><?= $obat['nama_generik'] ?></td>
              <td><?= $obat['nama_merek'] ?></td>
              <td><?= $obat['deskripsi'] ?></td>
              <td><?= $obat['stok'] . ' ' . $obat['unit'] ?></td>
              <td><?= $obat['efek_samping'] ?></td>
              <td><?= $obat['kontradiksi'] ?></td>
              <td><?= $obat['peringatan'] ?></td>
              <td><?= $obat['interaksi_obat'] ?></td>
              <td><?= $obat['produsen'] ?></td>
              <td>Rp.<?= $obat['harga'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else : ?>
    <h2>obat kosong</h2>
  <?php endif; ?>
</div>