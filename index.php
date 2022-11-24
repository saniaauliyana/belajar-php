<?php
//buat koneksi dengan Mysql
$con = mysqli_connect("localhost", "root", "", "fakultas");
// cek koneksi dengan Mysql
if (mysqli_connect_errno()) {
    echo "koneksi gagal" . mysqli_connect_error();
} else {
    //echo "koneksi berhasil";
}

// 3. membaca data dari table mysql.
$query = "SELECT * FROM mahasiswa";

// 4. tampilkan data, dengan menjalankan sql query
$result = mysqli_query($con, $query);
$mahasiswa = [];
if ($result) {
    // tampilkan data satu per satu
    while ($row = mysqli_fetch_assoc($result)) {
        //echo "<br>".$row["nama"];
        $mahasiswa[] = $row;
    }
    mysqli_free_result($result);
}

// 5.tutup koneksi mysql
mysqli_close($con);

/*foreach($mahasiswa as $value){
    echo $value["nama"];
}*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Belajar PHP</a>
    </nav>
    <div class="container badan">
        <div class="row peding-30">
            <h1>Data Mahasiswa</h1>
            <div class="mb-3">
                <p>
                    Berikut merupakan data dari mahasiswa Universitas Suaka
                </p>
            </div>
            <div class="mb-3">
                <a class="btn btn-primary" href="insert.php" role="button">Tambah Data</a>
            </div>

            <?php //var_dump($mahasiswa) 
            ?>

            <table class=" table table-bordered" style="width: 100%;">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($mahasiswa as $row) : ?>
                    <tr>
                        <td><?php echo $row["nim"]; ?></td>
                        <td><?php echo $row["nama"]; ?></td>
                        <td><?php echo $row["jenis_kelamin"]; ?></td>
                        <td><?php echo $row["tempat_lahir"]; ?></td>
                        <td><?php echo $row["tanggal_lahir"]; ?></td>
                        <td><?php echo $row["alamat"]; ?></td>
                        <td>
                            <a href="update.php?id=<?= $row['id'] ?>" >Edit</a> | 
                            <a href="delete.php?id=<?= $row['id'] ?>" >Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>