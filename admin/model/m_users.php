<?php

function getUsers()
{
   global $koneksi;
   $x = [];
   $sql   = "SELECT * FROM `users` inner join profil on users.id_user = profil.id_user";
   $query = mysqli_query($koneksi, $sql);
   while ($data  = mysqli_fetch_assoc($query)) {
      $x[] = $data;
   }

   return $x;
}


function insertUsers($data)
{
   global $koneksi;
   $sql = "INSERT INTO `users`(`username`, `email`, `password`, `level`, `status`, `created_at`) VALUES ('$data[username]','$data[email]', '$data[password]', '$data[level]', '$data[status]', '$data[createdAt]')";
   $insertUsers = mysqli_query($koneksi, $sql);

   $idUsers = mysqli_insert_id($koneksi);

   if ($insertUsers) {
      $sql2 = "INSERT INTO `profil`(`nama_depan`, `nama_belakang`, `id_user`) VALUES ('$data[namaDepan]', '$data[namaBelakang]', '$idUsers')";
      $insertProfil = mysqli_query($koneksi, $sql2);

      if ($insertProfil) {
         notif("Berhasil Menambahkan Data users", 'success');
         header("Location: ?page=users");
      }
   }
}
