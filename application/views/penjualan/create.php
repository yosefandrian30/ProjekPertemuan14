   <div class="mt-3">
    <form action="<?= base_url('barang/simpanbarang') ?>" method="POST">
     <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
      <input type="text" name="nama_barang" class="form-control" id="exampleFormControlInput1" placeholder="Nama Barang">
     </div>
     <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Harga</label>
      <input type="number" name="harga" class="form-control" id="exampleFormControlInput1" placeholder="Harga">
     </div>
     <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Stock</label>
      <input type="number" name="stok" class="form-control" id="exampleFormControlInput1" placeholder="Stock Barang">
     </div>
     <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
      <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
     </div>
     <div class="mb-3">
      <button type='submit' class="btn btn-primary">Save</button>
     </div>
    </form>

   </div>
 