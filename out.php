<?php
// Konfigurasi koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'food'; // Ganti dengan nama database yang sesuai

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $password, $database);

// Memeriksa apakah koneksi berhasil
if (mysqli_connect_errno()) {
  die('Failed to connect to the database: ' . mysqli_connect_error());
}

// Query untuk mengambil data dari tabel
$query = "SELECT * FROM orderan";
$result = mysqli_query($conn, $query);

// Memeriksa apakah query berhasil
if ($result) {
  // Memeriksa apakah ada data yang diambil
  if (mysqli_num_rows($result) > 0) {
    // Menampilkan data dalam bentuk tabel
    echo '<table>';
    echo '<tr><th>ID</th><th>Nama</th><th>Alamat</th></tr>';

    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td>' . $row['id'] . '</td>';
      echo '<td>' . $row['nama'] . '</td>';
      echo '<td>' . $row['alamat'] . '</td>';
      echo '</tr>';
    }
    
    echo '</table>';
  } else {
    echo 'No data found.';
  }
} else {
  echo 'Failed to fetch data: ' . mysqli_error($conn);
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
