<?php
session_start();

// fungsi untuk menghapus seluruh session
session_destroy();

// redirect ke halaman index.php (halaman login)
header('Location: index.php');
?>