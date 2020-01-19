


<?php 

// $koneksi = mysqli_connect("dewserver.database.windows.net","dewadmin","Dewohat97","yemDB");

// if (mysqli_connect_errno()){
// 	echo "Koneksi database gagal : " . mysqli_connect_error();
// }

?>


<?php
    $host = "dewserver.database.windows.net";
    $user = "dewadmin";
    $pass = "Dewohat97";
    $db = "yemDB";

    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }