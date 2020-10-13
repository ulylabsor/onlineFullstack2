<?php
$data = getLayananByIdA($_GET['id']);
?>
<h3>Ubah Data Layanan</h3>
<form action="?page=aksi-layanan" method="POST">
   <input type="text" class="form-control" name="id_Layanan" id="id_Layanan" value="<?= $data['id_layanan'] ?>" hidden readonly>
   <div class="row">
      <div class="col">
         <div class="form-group">
            <label for="layanan">Layanan</label>
            <input type="layanan" class="form-control" name="layanan" id="layanan" aria-describedby="emailHelp" value="<?= $data['email'] ?>">
            <small id="emailHelp" class="form-text text-muted">Masukkan Tipe Layanan.</small>
         </div>
      </div>
      <div class="col">
         <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="keterangan" name="keterangan" class="form-control" id="keterangan">
            <small id="emailHelp" class="form-text text-muted">Lama Jasa Kirim</small>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <div class="form-group">
            <input type="checkbox" id="icon" name="icon" <?= $data['icon'] == 'Y' ? 'checked' : '' ?>>
            <label for="status">Aktif</label>
         </div>
      </div>
      <div class="col">
         <div class="form-group">
            <label for="level">Level</label>
            <select name="level" id="level" name="level" class="form-control">
               <option value="customer" <?= $data['level'] == 'customer' ? 'selected' : '' ?>>Customer</option>
               <option value="kurir" <?= $data['level'] == 'kurir' ? 'selected' : '' ?>>Kurir</option>
               <option value="admin" <?= $data['level'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>
         </div>
      </div>
   </div>

   <center>
      <button type="submit" class="btn btn-primary" name="update-users" style="width: 50%;">Simpan Perubahan</button>
      <a href="?page=users" class="btn btn-danger">Batal</a>
   </center>
</form>