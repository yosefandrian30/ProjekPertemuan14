    <div class="row mt-2">
      <div class="col-3">
        <!-- Button trigger modal -->
        <a href="<?=base_url('penjualandetail/proses/'. $penjualan['penjualan_id'])?>" type="button" class="btn btn-primary">
          Tambah
        </a>
      </div>
    </div>
    <table class="table mt-2">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Diskon</th>
          <th scope="col">Harga Total</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($penjualandetail as $no => $penjualan) {
        ?>
          <tr>
            <th scope="row"><?= $no + 1 ?></th>
            <td><?= $penjualan['nama_barang']; ?></td>
            <td><?= $penjualan['jumlah']; ?></td>
            <td><?= $penjualan['diskon']; ?></td>
            <td><?= $penjualan['harga_total']; ?></td>
            <td>
              <a href="<?= base_url('penjualan/detail/' . $penjualan['penjualan_id']) ?>" class="btn btn-warning">Detail</a>
              <a href="<?= base_url('penjualan/hapus/' . $penjualan['penjualan_id']) ?>" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Penjaulan<?= date('y-m-d') ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('penjualan/simpanpenjualan') ?>" method="POST">
              <input type="hidden" name="tgl_penjualan" value="<?= date('y-m-d') ?>">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Pelanggan</label>
                <select class="form-select" name="pelanggan_id" aria-label="Default select example">
                  <option selected>-- Pilih Pelanggan --</option>
                  <?php foreach ($allpelanggan as $key => $pelanggan) { ?>


                    <option value="<?= $pelanggan['pelanggan_id'] ?>"><?= $pelanggan['nama_pelanggan'] ?></option>
                  <?php } ?>
                </select>
              </div>

              <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
              <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <button type='submit' class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>

      </div>
    </div>
    </div>