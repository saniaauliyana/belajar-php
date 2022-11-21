<?php
if (isset($_POST["submit"])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $id_jurusan = $_POST['id_jurusan'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];

    //buat koneksi dengan Mysql
    $con = mysqli_connect("localhost", "root", "", "fakultas");
    // cek koneksi dengan Mysql
    if (mysqli_connect_errno()){
        echo "koneksi gagal" . mysqli_connect_error();
    } else {
        //echo "koneksi berhasil";
    }

    //buat sql query untuk insert ke database
    //buat query insert dan jalankan
    $sql = "insert into mahasiswa (nim,nama,id_jurusan,tempat_lahir,tanggal_lahir,jenis_kelamin,alamat) values ('$nim','$nama','$id_jurusan','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$alamat')";

    //jalankan query
    if (mysqli_query($con, $sql)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "ada error" . $sql .mysqli_error($con);
    }
    //tutup koneksi dengan database
    mysqli_close($con);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Belajar PHP</a>
    </nav>
    <div class="container badan">
        <div class="row">
            <div class="col peding-100">
                <h1>Form Pendataan Mahasiswa</h1>
                <p>
                    Silahkan isi form dengan benar.
                </p>
            </div>
            <div class="col peding-30">
                <form action="insert.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputnim" class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputnama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleInputidjurusan" class="form-label">ID Jurusan</label>
                        <input type="number" class="form-control" name="id_jurusan">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleInputgender" class="form-label">gender</label>
                        <input type="text" class="form-control" name="jenis_kelamin">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleInputtempatlahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleInputtanggallahir" class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tanggal_lahir" placeholder="(yyyy-mm-dd)">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleInputalamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <a class="btn btn-primary" href="index.php" role="button">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>