<?php

function lihatLayanan()
{
   global $koneksi;
   $x = [];
   $sql   = "SELECT * FROM tb_layanan";
   $query = mysqli_query($koneksi, $sql);
   while ($data  = mysqli_fetch_assoc($query)) {
      $x[] = $data;
   }

   return $x;
}
