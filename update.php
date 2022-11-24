<?php

if (isset($_GET['id'])) {
    // ambil id dari url atau method get
    $id = $_GET['id'];

    // Buat koneksi dengan MySQL
    $con = mysqli_connect("localhost", "root", "", "fakultas");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } /*else {
        echo '<br>koneksi berhasil';
    }*/

    $sql = "SELECT * FROM mahasiswa WHERE id='$id'";

    if ($result = mysqli_query($con, $sql)) {
        //echo "<br>data tersedia";
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nim = $user_data['nim'];
            $nama = $user_data['nama'];
            $id_jurusan = $user_data['id_jurusan'];
            $tempat_lahir = $user_data['tempat_lahir'];
            $tanggal_lahir = $user_data['tanggal_lahir'];
            $jenis_kelamin = $user_data['jenis_kelamin'];
            $alamat = $user_data['alamat'];
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

if (isset($_POST['submit'])) {
    //var_dump($_POST);
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $id_jurusan = $_POST['id_jurusan'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];

    // Buat koneksi dengan MySQL
    $con = mysqli_connect("localhost", "root", "", "fakultas");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        echo '<br>koneksi berhasil';
    }

    $sql = "UPDATE mahasiswa SET nim='$nim',nama='$nama',id_jurusan='$id_jurusan',tempat_lahir='$tempat_lahir',
    tanggal_lahir='$tanggal_lahir',alamat='$alamat' WHERE id='$id' ";

    if (mysqli_query($con, $sql)) {
        echo "<br>Data berhasil diupdate";
        header("location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data mahasiswa</title>
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
                <h1>Update Data Mahasiswa</h1>
                <p>
                    Silahkan isi form dengan benar.
                </p>
                <img width="400" height="300"src="https://images.pexels.com/photos/1454360/pexels-photo-1454360.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="">
            </div>
            <div class="col peding-30">
                <?php if (isset($_GET['id'])) : ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="exampleInputnim" class="form-label">NIM</label>
                            <input type="text" class="form-control" name="nim" value="<?php echo $nim; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputnama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
                        </div>
                        <div class="mb-3 ">
                            <label for="exampleInputidjurusan" class="form-label">ID Jurusan</label>
                            <input type="number" class="form-control" name="id_jurusan" value="<?php echo $id_jurusan; ?>">
                        </div>
                        <div class="mb-3 ">
                            <label for="exampleInputgender" class="form-label">gender</label>
                            <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>">
                        </div>
                        <div class="mb-3 ">
                            <label for="exampleInputtempatlahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>">
                        </div>
                        <div class="mb-3 ">
                            <label for="exampleInputtanggallahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" name="tanggal_lahir" placeholder="(yyyy-mm-dd)" value="<?php echo $tanggal_lahir; ?>">
                        </div>
                        <div class="mb-3 ">
                            <label for="exampleInputalamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>">
                        </div>
                        <div class="d-grid gap-2 d-md-block">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            <a class="btn btn-primary" href="index.php" role="button">Kembali</a>
                        </div>

                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>