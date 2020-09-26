<?php
$server = 'localhost';
$user   = 'root';
$pass   = 'zxcv';
$db     = 'db_ekspedisio2';

$koneksi = mysqli_connect($server, $user, $pass, $db) or die(mysqli_errno($konek));
