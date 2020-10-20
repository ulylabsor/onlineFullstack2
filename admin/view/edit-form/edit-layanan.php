<?php
$data = getLayananByIdA($_GET['id']);
?>
<h3>Ubah Data Layanan</h3>
<form action="?page=aksi-layanan" method="POST" enctype="multipart/form-data">
   <input type="text" class="form-control" name="idLayanan" id="idLayanan" value="<?= $data['id_layanan'] ?>" hidden readonly>
   <div class="row">
      <div class="col">
         <div class="form-group">
            <label for="layanan">Layanan</label>
            <input type="text" class="form-control" name="layanan" id="layanan" aria-describedby="emailHelp" value="<?= $data['layanan'] ?>">
            <small id="emailHelp" class="form-text text-muted">Masukkan Tipe Layanan.</small>
         </div>
         <div class="form-group">
            <label for="icon">Icon</label>
            <input type="file" class="form-control" name="icon" id="icon" value="<?= $data['icon'] ?>">
         </div>
         <div class="form-group">
            <label for="link">Link</label>
            <input type="text" class="form-control" name="link" id="link" value="<?= $data['link'] ?>">
         </div>
      </div>
      <div class="col">
         <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" name="keterangan" id="keterangan" rows="2"></textarea>
         </div>
         <img src="../images/layanan/<?= $data['icon'] ?>" width="150">
      </div>
   </div>
   <div class="row">
      <div class="col">
         <div class="form-group">
            <input type="checkbox" id="status" name="status" <?= $data['status_layanan'] == 'aktif' ? 'checked' : '' ?>>
            <label for="status">Aktif</label>
         </div>
      </div>
   </div>

   <center>
      <button type="submit" class="btn btn-primary" name="update-layanan" style="width: 50%;">Simpan Perubahan</button>
      <a href="?page=layanan" class="btn btn-danger">Batal</a>
   </center>
</form>