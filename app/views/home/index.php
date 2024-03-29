<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
      <?php Flasher::flashCheckout(); ?>
    </div>
  </div>
  <div class="row">
    <div class="d-flex align-items-center justify-content-end gap-2 py-2">
      <?php if ($_SESSION['level'] == 'admin') : ?>
        <a href="<?= BASEURL ?>/report/"><i class="bi bi-file-earmark-pdf"></i> report</a>
      <?php else : ?>
        <a href="<?= BASEURL ?>/cart/"><i class="bi bi-cart"></i> keranjang</a>
      <?php endif ?>
      <p class="m-0"><?= $_SESSION['nama'] ?></p>
      <a href="<?= BASEURL ?>/login/logout" class="btn btn-outline-danger btn-sm ">logout</a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h1 class="text-capitalize">daftar obat</h1>
      <form action="<?= BASEURL ?>/home/cari" method="post">
        <div class="input-group my-3">
          <input type="text" class="form-control" placeholder="cari obat" name="keyword" id="keyword" value="<?= $data['keyword'] ?>" autocomplete=" off">
          <button class="btn btn-outline-primary" type="submit" id="tombolCari"><i class="bi bi-search"></i>
            Cari</button>
        </div>
      </form>
      <?php if ($_SESSION['level'] == 'admin') : ?>
        <a href="<?= BASEURL ?>/home/tambahObat" class="btn btn-primary"><i class="bi bi-plus"></i> tambah obat</a>
      <?php endif ?>
      <?php if (!empty($data['obat'])) : ?>
        <div class="table-responsive mt-2">
          <table class="table table-striped table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>kode obat</th>
                <th>nama generik</th>
                <th>nama merek</th>
                <th>stok</th>
                <th>produsen</th>
                <th>harga</th>
                <?php if ($_SESSION['level'] == 'admin') : ?>
                  <th>update</th>
                  <th>hapus</th>
                <?php else : ?>
                  <th>aksi</th>
                <?php endif ?>
              </tr>
            </thead>
            <tbody class="">
              <?php foreach ($data['obat'] as $obat) : ?>
                <tr>
                  <td><a href="<?= BASEURL ?>/home/detail/<?= $obat['kode'] ?>"><?= $obat['kode'] ?></a></td>
                  <td><a href="<?= BASEURL ?>/home/detail/<?= $obat['kode'] ?>"><?= $obat['nama_generik'] ?></a></td>
                  <td><a href="<?= BASEURL ?>/home/detail/<?= $obat['kode'] ?>"><?= $obat['nama_merek'] ?></a></td>
                  <td><?= $obat['stok'] . ' ' . $obat['unit'] ?></td>
                  <td><?= $obat['produsen'] ?></td>
                  <td>Rp.<?= $obat['harga'] ?></td>
                  <?php if ($_SESSION['level'] == 'admin') : ?>
                    <td>
                      <a href="<?= BASEURL ?>/home/update/<?= $obat['kode']; ?>" class="btn btn-secondary btn-sm"><i class="bi bi-pencil"></i> edit</a>
                    </td>
                    <td>
                      <a href="<?= BASEURL ?>/home/hapus/<?= $obat['kode']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin?')"><i class="bi bi-trash"></i> hapus</a>
                    </td>
                  <?php else : ?>
                    <td>
                      <a href="<?= BASEURL ?>/cart/tambah/<?= $obat['kode']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-bag-plus"></i> masukkan keranjang</a>
                    </td>
                  <?php endif ?>
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