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
$query = "SELECT * FROM delivery";
$result = mysqli_query($conn, $query);

// Memeriksa apakah ada data yang dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  // Query untuk menyimpan data ke dalam tabel
  $insertQuery = "INSERT INTO delivery (name, address, phone) VALUES ('$name', '$address', '$phone')";
  if (mysqli_query($conn, $insertQuery)) {
    echo "<p>Data has been successfully saved to the database.</p>";
  } else {
    echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
  }
}

// Menutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delivery Output</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card mt-5">
          <div class="card-header">
            <h3 class="text-center">Delivery Output</h3>
          </div>
          <div class="card-body">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $name = $_POST['name'];
              $address = $_POST['address'];
              $phone = $_POST['phone'];

              echo "<p><strong>Name:</strong> $name</p>";
              echo "<p><strong>Address:</strong> $address</p>";
              echo "<p><strong>Phone:</strong> $phone</p>";
            } else {
              echo "Invalid request!";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
