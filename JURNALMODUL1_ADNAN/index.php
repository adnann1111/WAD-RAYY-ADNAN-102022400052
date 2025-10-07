<?php
// **********************  1  **************************
// Inisialisasi variabel
$nama = $email = $nomorHp = $pilihFilm = $jumlahTiket = "";
$namaErr = $emailErr = $nomorHpErr =  $pilihFilmErr = $jumlahTiketErr = "";

// **********************  2  **************************
// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST")
    
    // **********************  3  **************************
    // Ambil nilai Nama dari form
    // silakan taruh kode kalian di bawah
    //buatkan validasi yang sesuai
    $nama = trim($_POST["nama"]);
    if (empty($nama)) { 
      $namaErr = "Nama wajib diisi"; 
    }

    // **********************  4  **************************
    // Ambil nilai Email dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $email = trim($_POST["email"]);
    if (empty($email)) { 
      $emailErr = "Email wajib diisi"; 
    } 
    elseif (!filter_var($email,
FILTER_VALIDATE_EMAIL)) { 
  $emailErr = "Format email tidak valid"; 
}



    // **********************  5  **************************
    // Ambil nilai Nomor HP dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $nomor = trim($_POST["nomor"]);
    if (empty($nomorHp)) { 
      $nomorHpErr = "Nomor telepon wajib diisi"; 
    } 
    elseif
(!ctype_digit($nomorHp)) {
   $nomorHpErr = "Nomor telepon hanya boleh angka"; 
  }


    // **********************  6  **************************
    // Ambil nilai Film (dropdown)
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $pilihFilm = $_POST["film"] ?? "";
    if (empty($pilihFilm)) { 
      $pilihFilmErr = "Pilih Film"; 
    }


    // **********************  7  **************************
    // Ambil nilai Jumlah Tiket dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $jumlahTiket = trim($_POST["jumlah"]);
    if (empty($jumlahTiket)) { 
      $jumlahTiketErr = "Jumlah Tiket wajib diisi"; 
    }
    elseif
(!ctype_digit($jumlahTiket)) { 
  $jumlahTiketErr = "Jumlah Tiket hanya boleh diisi oleh angka"; }




?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pemesanan Tiket Bioskop</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <!-- **********************  8  **************************
       Tambahkan nilai atribut di dalam src dengan nama file gambar logo bioskop
  -->
  <img src="EAD.png" alt="Logo Bioskop EAD" class="logo">

  <h2>Form Pemesanan Tiket Bioskop</h2>
  <form method="post" action="">
    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr ? "* $emailErr" : ""; ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Nomor HP:</label>
    <input type="text" name="nomor" value="<?php echo $nomorHp; ?>">
    <span class="error"><?php echo $emailErr ? "* $emailErr" : ""; ?></span>

    <label>Pilih Film:</label>
    <select name="film">
      <option value="">-- Pilih Film --</option>
      <option value="Interstellar">Interstellar</option>
      <option value="Inception">Inception</option>
      <option value="Oppenheimer">Oppenheimer</option>
      <option value="Avengers: Endgame">Avengers: Endgame</option>
    </select>
    <span class="error"><?php echo $pilihFilmErr; ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Jumlah Tiket:</label>
    <input type="text" name="jumlah" value="<?php echo $jumlahTiket; ?>">
    <span class="error"><?php echo $emailErr ? "* $jumlahTiketErr" : ""; ?><</span>

    <button type="submit">Pesan Tiket</button>
  </form>
  
  <!-- **********************  9  ************************** -->
  <!-- Tampilkan hasil input dalam tabel jika semua valid -->
  <!-- silakan taruh kode kalian di bawah -->
   <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && !$namaErr && !$emailErr && !$nomorHp && !$pilihFilm &&$jumlahTiketErr) { ?>
  <div class="container">
    <h3> Data Pemesanan:</h3>
  </div class="table-container">
        <table>
          <thead>
            <tr>
              <th width="15%">Nama </th>
              <th width="20%">Email </th>
              <th width="15%">Nomor HP </th>
              <th width="15%">Film </th>
              <th width="15%">Jumlah Tiket </th>
            </tr>
          </thead>
          <td><?php echo $nama; ?></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $nomorHp; ?></td>
          <td><?php echo $pilihFilm; ?></td>
          <td><?php echo $jumlahTiket; ?></td>
  <?php } ?>

  </div>
</body>
</html>
