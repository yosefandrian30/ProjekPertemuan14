    <div class="row mt-2">
        <div class="col-3">
          <a href="<?= base_url('barang/create') ?>" class="btn btn-success">Tambah</a>
        </div>
      </div>
      <table class="table mt-2">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga Barang</th>
            <th scope="col">Stok</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($allbarang as $no => $ab) {
          ?>
            <tr>
              <th scope="row"><?= $no + 1 ?></th>
              <td><?= $ab['nama_barang']; ?></td>
              <td><?= $ab['harga_barang']; ?></td>
              <td><?= $ab['stok']; ?></td>
              <td><?= $ab['keterangan']; ?></td>
              <td>
                <a href="<?= base_url('barang/edit/' . $ab['barang_id']) ?>" class="btn btn-warning">Edit</a>
                <a href="<?= base_url('barang/hapus/' . $ab['barang_id']) ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
   