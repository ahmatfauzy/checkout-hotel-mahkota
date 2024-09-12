$(function () {
    $("#tanggal-pesan").datepicker({
      dateFormat: "dd/mm/yy",
      changeYear: true,
      changeMonth: true,
    });
  });

  document
    .getElementById("nomor-identitas")
    .addEventListener("input", function () {
      // Menghapus karakter selain angka dari nilai input
      this.value = this.value.replace(/\D/g, "");
    });

  let durasiMenginapInput = document.getElementById("durasi-menginap");
  durasiMenginapInput.addEventListener("input", function () {
    let durasiMenginapValue = durasiMenginapInput.value;

    // Validasi jika nilai yang dimasukkan bukan angka
    if (
      isNaN(durasiMenginapValue) ||
      durasiMenginapValue === "" ||
      durasiMenginapValue <= 0
    ) {
      alert("Input Harus Angka");
      durasiMenginapInput.value = ""; // Kosongkan nilai input jika tidak valid
    }
  });

  function updateHarga() {
    const selectElement = document.getElementById("tipe-kamar");
    const selectedOption =
      selectElement.options[selectElement.selectedIndex];
    const selectedPrice = selectedOption.getAttribute("data-harga");

    document.getElementById("harga").value = selectedPrice;

    // Update total bayar jika durasi menginap telah diisi
    hitungTotal();
  }

  function hitungTotal() {
    let hargaKamar = parseFloat(document.getElementById("harga").value);
    let durasiMenginap = parseInt(
      document.getElementById("durasi-menginap").value
    );

    let totalBayar = hargaKamar * durasiMenginap;

    // Diskon 10% jika durasi menginap 3 hari atau lebih
    if (durasiMenginap >= 3) {
      totalBayar *= 0.9; // Mengurangi 10%
    }

    // Penambahan biaya jika pesan breakfast
    if (document.getElementById("breakfast").checked) {
      totalBayar += durasiMenginap * 80000;
    }

    document.getElementById("total-bayar").value = totalBayar;
  }

  function clearForm() {
    document.getElementById("booking-form").reset();
  }

  $("#booking-form").on("submit", function (event) {
    event.preventDefault(); // Mencegah pengiriman form secara default

    let nomorIdentitas = document.getElementById("nomor-identitas").value;

    // Validasi Nomor Identitas harus 16 digit
    if (nomorIdentitas.length !== 16 || isNaN(nomorIdentitas)) {
      alert("Isian salah. Data Identitas Harus 16 digit angka.");
      return; // Hentikan proses jika validasi tidak terpenuhi
    }

    // Simpan data menggunakan AJAX
    $.ajax({
      type: "POST",
      url: "proses_pesan.php",
      data: $(this).serialize(), // Mengambil data formulir
      success: function (response) {
        alert("Data berhasil disimpan ke dalam database!");
        window.location.href = "listBooking.php"; // Arahkan ke halaman listBooking.php
      },
      error: function (xhr, status, error) {
        alert("Terjadi kesalahan: " + error);
      },
    });
  });