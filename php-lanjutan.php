<?php
$nama = "Sania";
$nama1= "Auliyana";
$no = 10;
$i = 0;

//PERULANGAN

/*Perulangan For
for ($i=0;$i<$no;$i++){
    $n=$i+1;
    echo $n."".$nama."<br/>";
}
Perulangan While
while ($i<$no){
    $n=$i+1;
    echo $n."".$nama1."<br/>";
    $i++;
}
Perulangan do while
do {
    $n = $i + 1;
    echo $n." ".$nama."<br/>";
    $i++;
} while ($i < $no);

$data = array('Avanza','Lamborghini','Tesla','Rubicon','Xpander','Xenia');

while ($i <count($data)){
    echo $data[$i]."<br/>";
    $i++;
}*/

//echo $data[5]."<br/>";

/*foreach ($data as $value) {
    echo $value."<br/>";
}*/

//PERCABANGAN
/*if ($nama1 == "Sania") {
    echo $nama1." adalah orang Jember";
} else if ($nama1 == "Auliyana") {
    echo $nama1." adalah orang Jawa Timur";
} else {
    echo $nama1." adalah orang asing";
}

switch ($nama1) {
    case "Sania":
        $pesan = $nama1." adalah orang Jember";
    break;
    case "Auliyana":
        $pesan = $nama1." berasal dari Jawa Timur";
    break;
    default:
        $pesan = $nama1." darimana ya?";
    break;
        
}
echo $pesan;*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form Nama</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label>Nama</label>
        <input type="text" name="nama">
        <label>Jumlah</label>
        <input type="text" name="no">
        <input type="submit" name="submit" value="Sumbit">
    </form>
    <?php
    if (!empty($_POST['submit'])) {
        switch ($_POST['nama']) {
            case "Sania":
                $perintah = $_POST['nama']." adalah orang Jember";
            break;
            case "Auliyana":
                $perintah = $_POST['nama']." berasal dari Jawa Timur";
            break;
            default:
                $perintah = $_POST['nama']." darimana ya?";
            break;
                
        }
        for ($i=0; $i < $_POST['no']; $i++) { 
            echo $perintah."<br>";
        }
    } else {
        echo "Anda belum input nama dan jumlah";
    }
    ?>
</body>
</html>
