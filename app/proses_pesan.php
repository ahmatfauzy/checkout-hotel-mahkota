<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
$namaPemesan = $_POST['nama'];
$jenisKelamin = $_POST['jenis-kelamin'];
$nomorIdentitas = $_POST['nomor-identitas'];
$nomorIdentitasClean = preg_replace('/[^0-9]/', '', $nomorIdentitas);
$nomorIdentitasInt = intval($nomorIdentitasClean);
$tipeKamar = $_POST['tipe-kamar'];
$tanggalPesan = $_POST['tanggal-pesan'];
$result = explode('/', $tanggalPesan);
$date = $result[0];
$month = $result[1];
$years = $result[2];
$new = $years . '-' . $month . '-' . $date;

if(isset($_POST['durasi-menginap'])) {
  $durasi_menginap = intval($_POST['durasi-menginap']);
    // Cek apakah durasi menginap 3 hari atau lebih
    if ($durasi_menginap >= 3) {
      $diskon = 10; // Diskon 10%
  } else {
      $diskon = 0; // Tidak ada diskon
  }
}

$durasiMenginap = $_POST['durasi-menginap'];
$totalBayar = $_POST['total-bayar'];


$stmt = $conn->prepare("INSERT INTO `history` (`Nama_Pemesan`, `JenisKelamin`, `Nomor_Identitas`, `Tipe_Kamar`, `Tanggal_Pesan`, `Durasi_Menginap`, `Diskon`, `Total_Bayar`) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssissidi", $namaPemesan, $jenisKelamin, $nomorIdentitasInt, $tipeKamar, $new, $durasiMenginap, $diskon, $totalBayar);


  if ($stmt->execute()) {
    echo "Data berhasil disimpan ke dalam database";
    header("Location: listBooking.php");
    exit();
  } else {
    echo "Error: " . $stmt->error;
  }

$stmt->close();
$conn->close();
?>
