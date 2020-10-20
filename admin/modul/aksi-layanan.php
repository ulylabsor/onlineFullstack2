<?php
if (isset($_POST['save-layanan'])) {

   $data = [
      "layanan"       => $_POST['layanan'],
      "link"          => $_POST['link'],
      "keterangan"    => $_POST['keterangan'],
      "statusLayanan" => $_POST['status'] == 'on' ? 'aktif' : 'tidak aktif'
   ];

   $ekstensiOK = ['jpg', 'png', 'gif'];
   $namaFile   = $_FILES['icon']['name'];
   $tmpFile    = $_FILES['icon']['tmp_name'];
   $sizeFile   = $_FILES['icon']['size'];

   $pisah = explode(".", $namaFile);
   $ekstensi = strtolower(end($pisah));

   if ($namaFile <> null) {
      if (in_array($ekstensi, $ekstensiOK)) {
         if ($sizeFile < 512000) { // maks. 500Kb
            //Memindahkan file ke dalam project
            move_uploaded_file($tmpFile, "../images/layanan/" . time() . '-' . $namaFile);

            $data['icon'] = time() . '-' . $namaFile;
            $insertData = insertLayanan($data);

            if ($insertData) {
               notif('Berhasil Menambahkan data Layanan', 'success');
               header("Location: ?page=layanan");
            }
         } else {
            notif('Ukuran File terlalu besar', 'warning');
            header("Location: ?page=layanan");
         }
      } else {
         notif('Format file tidak sesuai', 'warning');
         header("Location: ?page=layanan");
      }
   } else {
      $data['icon'] = null;
      $insertData = insertLayanan($data);

      if ($insertData) {
         notif('Berhasil Menambahkan data Layanan', 'success');
         header("Location: ?page=layanan");
      }
   }
}

if (isset($_POST['update-layanan'])) {
   $data = [
      "idLayanan"    => $_POST['idLayanan'],
      "layanan"       => $_POST['layanan'],
      "keterangan"    => $_POST['keterangan'],
      "link"          => $_POST['link'],
      "statusLayanan" => isset($_POST['status']) ? $_POST['status'] == 'on' ? 'aktif' : 'tidak aktif' : 'tidak aktif',
   ];

   $ekstensiOK = ['jpg', 'png', 'gif'];
   $namaFile   = $_FILES['icon']['name'];
   $tmpFile    = $_FILES['icon']['tmp_name'];
   $sizeFile   = $_FILES['icon']['size'];

   $pisah = explode(".", $namaFile);
   $ekstensi = strtolower(end($pisah));

   if ($namaFile <> null) {
      if (in_array($ekstensi, $ekstensiOK)) {
         if ($sizeFile < 512000) { // maks. 500Kb

            //hapus file lama
            $dataGambar = getLayananByIdA($_POST['idLayanan']);
            $hapusGambar = unlink("../images/layanan/" . $dataGambar['icon']);

            //Memindahkan file ke dalam project
            move_uploaded_file($tmpFile, "../images/layanan/" . time() . '-' . $namaFile);

            $data['icon'] = time() . '-' . $namaFile;
            $updateData = updateLayanan($data);

            if ($updateData) {
               notif(
                  "Berhasil Mengubah data Layanan",
                  'success'
               );
               header("Location: ?page=layanan");
            }
         } else {
            notif('Ukuran File terlalu besar', 'warning');
            header("Location: ?page=layanan");
         }
      } else {
         notif('Format file tidak sesuai', 'warning');
         header("Location: ?page=layanan");
      }
   } else {
      $data['icon'] = null;
      $updateData = updateLayanan($data);

      if ($updateData) {
         notif(
            "Berhasil Mengubah data Layanan",
            'success'
         );
         header("Location: ?page=layanan");
      }
   }
}


if (isset($_GET['delete'])) {
   if ($_GET['delete'] == 'one') {
      $idlayanan = $_GET['id'];

      $delete = deletelayanan($idlayanan);

      if ($delete) {
         notif("Berhasil menghapus data layanan", 'success');
         header("Location: ?page=layanan");
      }
   } else if ($_GET['delete'] == 'all') {
      $delete = deletelayanan();

      if ($delete) {
         notif("Berhasil menghapus data layanan", 'success');
         header("Location: ?page=layanan");
      }
   }
}
