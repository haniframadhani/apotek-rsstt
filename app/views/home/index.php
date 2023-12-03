<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h1 class="text-capitalize">daftar obat</h1>
      <form action="<?= BASEURL ?>/home/cari" method="post">
        <div class="input-group my-3">
          <input type="text" class="form-control" placeholder="cari obat" name="keyword" id="keyword"
            autocomplete="off">
          <button class="btn btn-outline-primary" type="button" id="tombolCari"><i class="bi bi-search"></i>
            Cari</button>
        </div>
      </form>
      <a href="<?= BASEURL ?>/home/tambahObat" class="btn btn-primary"><i class="bi bi-plus"></i> tambah obat</a>
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
              <th>update</th>
              <th>hapus</th>
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
              <td>
                <a href="<?= BASEURL ?>/home/update/<?= $obat['kode']; ?>" class="btn btn-secondary btn-sm"><i
                    class="bi bi-pencil"></i> edit</a>
              </td>
              <td>
                <a href="<?= BASEURL ?>/home/hapus/<?= $obat['kode']; ?>" class="btn btn-danger btn-sm"
                  onclick="return confirm('yakin?')"><i class="bi bi-trash"></i> hapus</a>
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