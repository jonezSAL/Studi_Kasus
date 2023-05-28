<style>
.btn {
  display: inline-block;
  padding: 10px 20px;
  text-decoration: none;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-primary {
  background-color: #007bff;
}

.btn:hover {
  background-color: #0056b3;
}

.btn-primary:hover {
  background-color: #0056b3;
}
</style>

<?php
// Mendapatkan data dari formulir
if (isset($_POST['menu_id'])) {
  $menu_id = $_POST['menu_id'];
} else {
  $menu_id = '';
}
if (isset($_POST['harga'])) {
  $harga = $_POST['harga'];
} else {
  $harga = '';
}
if (isset($_POST['ongkos'])) {
  $ongkos = $_POST['ongkos'];
} else {
  $ongkos = '';
}
if (isset($_POST['alamat'])) {
  $alamat = $_POST['alamat'];
} else {
  $alamat = '';
}

// Menghubungkan ke database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'food';
$conn = mysqli_connect($host, $user, $password, $database);

// Memastikan koneksi berhasil
if (mysqli_connect_errno()) {
  die('Gagal terhubung ke database: ' . mysqli_connect_error());
}

// Menyimpan data ke dalam tabel
$query = "INSERT INTO orderan (menu_id, harga, ongkos, alamat) VALUES ('$menu_id', '$harga', '$ongkos', '$alamat') ON DUPLICATE KEY UPDATE harga='$harga', ongkos='$ongkos', alamat='$alamat'";
$result = mysqli_query($conn, $query);

if ($result) {
  echo '<div>
          <input type="button" onclick="alert(\'Sambil menunggu pesanan di dapur, mending nonton dulu aja proses masaknya\')" value="Cek Pesanan mu!">
           <a input type="button" href="pay.php" class="btn btn-primary">History Pembayaran</a>
        </div>';
  echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
          <video width="400" controls>
            <source src="mupped.mp4" type="video/mp4">
          </video>
        </div>';
        echo '
        <div>
          <button type="submit" href="struk-rendang.php" class="btn btn-primary">History Pembayaran</button>
        </div>';
} else {
  echo 'Gagal menyimpan data ke database: ' . mysqli_error($conn);
}
// Menutup koneksi ke database
mysqli_close($conn);
?>
