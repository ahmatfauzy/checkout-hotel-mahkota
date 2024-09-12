<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History Pemesanan - Hotel Mahkota</title>
  <link rel="stylesheet" href="lib/bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <link rel="icon" href="img/icon.png">
  <link rel="stylesheet" href="style/listBooking.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

</head>

<body>
<header data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900" class="bg-light bg-body-tertiary shadow fixed-top" data-bs-theme="light">
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-light bg-body-tertiary" data-bs-theme="light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><strong>Hotel Mahkota</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="daftar-harga.html">Daftar Harga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Booking.html">Pesan Kamar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="listBooking.php">History List</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>

<main data-aos="zoom-in" data-aos-duration="500" data-aos-delay="1000" class="container mt-5 pt-5">
  <section id="tentang-kami">
    <div class="text-center mb-4">
      <h2>Data Pemesanan</h2>
    </div>
    
    <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Nama Pemesan</th>
            <th>Jenis Kelamin</th>
            <th>Nomor Identitas</th>
            <th>Tipe Kamar</th>
            <th>Tanggal Pesan</th>
            <th>Durasi Menginap</th>
            <th>Diskon</th>
            <th>Total Bayar</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hotel";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
              die("Koneksi Gagal: " . $conn->connect_error);
            }

            $sql = "SELECT `id_History`, `Nama_Pemesan`, `JenisKelamin`, `Nomor_Identitas`, `Tipe_Kamar`, `Tanggal_Pesan`, CONCAT(Durasi_Menginap, ' - Day')  AS Durasi_Menginap , CONCAT(diskon, '%') AS diskon, CONCAT('Rp.',Total_Bayar) AS Total_Bayar FROM `history` WHERE 1";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id_History"] . "</td>
                        <td>" . $row["Nama_Pemesan"] . "</td>
                        <td>" . $row["JenisKelamin"] . "</td>
                        <td>" . $row["Nomor_Identitas"] . "</td>
                        <td>" . $row["Tipe_Kamar"] . "</td>
                        <td>" . $row["Tanggal_Pesan"] . "</td>
                        <td>" . $row["Durasi_Menginap"] . "</td>
                        <td>" . $row["diskon"] . "</td>
                        <td>" . $row["Total_Bayar"] . "</td>
                      </tr>";
              }
            } else {
              echo "<tr><td colspan='9' class='text-center'>Tidak ada data pemesanan</td></tr>";
            }
            $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </section>
</main>

<footer class="py-3 text-center shadow p-3 text-light bg-dark">
  <p>Hak Cipta © 2024 Hotel Mahkota</p>
</footer>
<script src="lib/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>
