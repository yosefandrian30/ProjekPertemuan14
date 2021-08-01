   <div class="mt-3">
    <form action="<?= base_url('pelanggan/simpanpelanggan') ?>" method="POST">
     <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Nama Pelanggan</label>
      <input type="text" name="nama_pelanggan" class="form-control" id="exampleFormControlInput1" placeholder="Nama Pelanggan">
     </div>
     <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">No Tlp</label>
      <input type="number" name="no_tlp" class="form-control" id="exampleFormControlInput1" placeholder="No TLP">
     </div>
     <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
      <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
     </div>
     <div class="mb-3">
      <button type='submit' class="btn btn-primary">Save</button>
     </div>
    </form>

   </div>
 