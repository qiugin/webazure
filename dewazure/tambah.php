<?php
session_start();

// check apakah session username sudah ada atau belum.
// jika belum maka akan diredirect ke halaman index (login)
if( empty($_SESSION['username']) ){
    header('Location: index.php');
}

?>


<html>
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="css/style.css">
     <title>Dew Azure Web</title>

 </head>
 <body>

 <div class="center">
    <h1>Tambah Data Mahasiswa</h1>

    <a href="mhs.php"><button type="button" class="btn btn-info">Daftar Mahasiswa</button></a>
    
    <form class="form" method="post" action="" enctype="multipart/form-data" >
          Name : 
          <input type="text" name="nama_dew" id="nama_dew"/></br></br>
          NIM : 
          <input type="text" name="nim_dew" id="nim_dew"/></br></br>
          Prodi
          <select name="prodi_dew">
            <option value="informatika">informatika</option>
            <option value="arsitektur">arsitektur</option>
            <option value="filsafat">filsafat</option>
            <option value="matematika">matematika</option>
        </select>
          <input type="submit" name="submit" value="Tambah" />
    </form>
</div>


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

    if (isset($_POST['submit'])) {
        try {
            $nama = $_POST['nama_dew'];
            $nim = $_POST['nim_dew'];
            $prodi = $_POST['prodi_dew'];
            $date = date("Y-m-d");

            // Insert data
            $sql_insert = "INSERT INTO mhs_dew (nama_dew, nim_dew, prodi_dew, date) 
                        VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $nama);
            $stmt->bindValue(2, $nim);
            $stmt->bindValue(3, $prodi);
            $stmt->bindValue(4, $date);

            $stmt->execute();
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
        echo "berhasil Menambahkan Data";
    }
 ?>
 </body>
 </html>