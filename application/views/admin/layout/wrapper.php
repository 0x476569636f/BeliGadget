<?php

// Proteksi halaman admin
$this->admin_login->proteksi_halaman();
// Layout Halaman Admin
require_once('head.php');
require_once('sidebar.php');
require_once('header.php');
require_once('content.php');
require_once('footer.php');

?>