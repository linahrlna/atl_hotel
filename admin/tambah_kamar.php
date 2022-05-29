<?php
include '../koneksi.php';

$jenis_kamar = $_POST['jenis_kamar'];
$harga = $_POST['harga'];
$fasilitas = $_POST['fasilitas'];
$foto = $_FILES['foto']['name'];

if ($foto !="") {
    $extensi_diperbolehkan = array('png','jpg');
    $x = explode('.', $foto);
    $extensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto;
    if (in_array($extensi, $extensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
        $query = "INSERT INTO kamar (jenis_kamar,harga,fasilitasfoto) VALUES ('$jenis_kamar','$harga','$fasilitas''$nama_gambar_baru')";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan : ".mysqli_error($koneksi)."-".mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil ditambah.');window.location='kamar.php';</script>";
        }

    } else {
        echo "<script>alert('Extensi gambar harus png atau jpg.');window.location='kamar.php';</script>";
    } 

} else {
    $query = "INSERT INTO kamar (jenis_kamar,harga,fasilitas,foto) VALUES ('$jenis_kamar','$harga','$fasilitas' null)";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan : ".mysqli_error($koneksi)."-".mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil ditambah.');window.location='kamar.php';</script>";
    }
}

?>