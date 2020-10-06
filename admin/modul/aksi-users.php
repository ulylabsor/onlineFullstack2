<?php

$ambilUsername = explode("@", $_POST['email']);
$username = $ambilUsername[0];

$data = [
   "email"        => $_POST['email'],
   "username"     => $username,
   "password"     => $_POST['password'],
   "namaDepan"    => $_POST['namaDepan'],
   "namaBelakang" => $_POST['namaBelakang'],
   "status"       => $_POST['status'] == 'on' ? 'Y' : 'N',
   "level"        => $_POST['level'],
   "createdAt"    => date("Y-m-d H:i:s"),

];
$insertData = insertUsers($data);

if ($insertData) {
   notif('Berhasil Menambahkan data Users', 'success');
   header("Location: ?page=users");
}
