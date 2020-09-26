<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $cekLogin = cekLogin($username, $password);

      if ($cekLogin == 'ok') {
         notif('Berhasil Login', 'success');
         header("Location: ?page=login");
      } else if ($cekLogin == 'salahUsername') {
         notif('Username yang anda inputkan salah', 'danger');
         header("Location: ?page=login");
      } else if ($cekLogin == 'salahPassword') {
         notif('Password yang anda inputkan salah', 'danger');
         header("Location: ?page=login");
      } else if ($cekLogin == 'akunNonAktif') {
         notif('Status akun tidak aktif. Silakan hub. Admin', 'warning');
         header("Location: ?page=login");
      }
   }
} else {
   header('Location: index.php');
}
