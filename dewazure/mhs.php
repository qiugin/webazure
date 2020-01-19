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

 <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand">DEW</a>
  <form class="form-inline">
    <a href="logout.php">Logout</a>
    
  </form>
</nav>

<div class="center2">
<!-- Menampilkan isi session username -->
<h3> Hallo Selamat Datang <?php echo $_SESSION['username']; ?> </h3>
<a href="tambah.php"><button type="button" class="btn btn-success">Tambah Data</button></a>
    <div class="table-responsive">
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

            try {
                $sql_select = "SELECT * FROM mhs_dew";
                $stmt = $conn->query($sql_select);
                $registrants = $stmt->fetchAll(); 
                if(count($registrants) > 0) {
                    
                    echo '<table class="table">';
                    echo '<tr><th scope="col">Name</th>';
                    echo '<th scope="col">NIM</th>';
                    echo '<th scope="col">Prodi</th>';
                    echo '<th scope="col">Date</th></tr>';

                    foreach($registrants as $registrant) {
                        echo "<tr><td>".$registrant['nama_dew']."</td>";
                        echo "<td>".$registrant['nim_dew']."</td>";
                        echo "<td>".$registrant['prodi_dew']."</td>";
                        echo "<td>".$registrant['date']."</td></tr>";

                    }
                    echo "</table>";
                } else {
                    echo "<h3>Tidak Ada Data Mahasiswa</h3>";
                }
            } catch(Exception $e) {
                echo "Failed: " . $e;
            }

        ?>
    </div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</div>
 </body>
 </html>