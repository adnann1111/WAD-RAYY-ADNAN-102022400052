<?php
// Inisialisasi variabel
$nama = $email = $nim = $jurusan = $alasan = "";
$namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";
$successMsg = "";
$dataPendaftar = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    // Validasi Nama
    if (empty($_POST["nama"])) {
        $namaErr = "Nama wajib diisi";
        $valid = false;
    } else {
        $nama = htmlspecialchars($_POST["nama"]);
    }

    // Validasi Email
    if (empty($_POST["email"])) {
        $emailErr = "Email wajib diisi";
        $valid = false;
    } else {
        $email = htmlspecialchars($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email tidak valid";
            $valid = false;
        }
    }

    // Validasi NIM
    if (empty($_POST["nim"])) {
        $nimErr = "NIM wajib diisi";
        $valid = false;
    } else {
        $nim = htmlspecialchars($_POST["nim"]);
        if (!ctype_digit($nim)) {
            $nimErr = "NIM harus berupa angka";
            $valid = false;
        }
    }

    // Validasi Jurusan
    if (empty($_POST["jurusan"])) {
        $jurusanErr = "Jurusan wajib dipilih";
        $valid = false;
    } else {
        $jurusan = htmlspecialchars($_POST["jurusan"]);
    }

    // Alasan
    $alasan = htmlspecialchars($_POST["alasan"]);

    // Jika semua valid
    if ($valid) {
        $successMsg = "Data Pendaftaran Berhasil!";
        $dataPendaftar = [
            "Nama" => $nama,
            "Email" => $email,
            "NIM" => $nim,
            "Jurusan" => $jurusan,
            "Alasan" => $alasan
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
    <div class="header">
        <img src="EAD.png" alt="Logo EAD" class="logo">
        <h1>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h1>
    </div>

    <form method="post" action="">
        <label><b>Nama:</b></label>
        <input type="text" name="nama" value="<?php echo $nama; ?>">
        <span class="error"><?php echo $namaErr; ?></span>

        <label><b>Email:</b></label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span>

        <label><b>NIM:</b></label>
        <input type="text" name="nim" value="<?php echo $nim; ?>">
        <span class="error"><?php echo $nimErr; ?></span>

        <label><b>Jurusan:</b></label>
        <select name="jurusan">
            <option value="">-- Pilih Jurusan --</option>
            <option value="Sistem Informasi" <?php if ($jurusan == "Sistem Informasi") echo "selected"; ?>>Sistem Informasi</option>
            <option value="Informatika" <?php if ($jurusan == "Informatika") echo "selected"; ?>>Informatika</option>
            <option value="Teknik Komputer" <?php if ($jurusan == "Teknik Komputer") echo "selected"; ?>>Teknik Komputer</option>
            <option value="Lainnya" <?php if ($jurusan == "Lainnya") echo "selected"; ?>>Lainnya</option>
        </select>
        <span class="error"><?php echo $jurusanErr; ?></span>

        <label><b>Alasan Bergabung:</b></label>
        <textarea name="alasan"><?php echo $alasan; ?></textarea>
        <span class="error"><?php echo $alasanErr; ?></span>

        <button type="submit">Daftar</button>
    </form>

    <?php if ($successMsg): ?>
        <p class="success"><?php echo $successMsg; ?></p>
    <?php endif; ?>

    <?php if (!empty($dataPendaftar)): ?>
        <h3>Data Pendaftar</h3>
        <div class="header">
        <img src="EAD.png" alt="Logo EAD" class="logo">
        <h1>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h1>
    </div>
        <table>
            <tr>
                <th>Field</th>
                <th>Isi</th>
            </tr>
            <?php foreach ($dataPendaftar as $field => $value): ?>
                <tr>
                    <td><?php echo $field; ?></td>
                    <td><?php echo $value; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
</body>
</html>
