<!DOCTYPE html>
<html>
<head>
  <title>Payment Table</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f8f9fa;
  padding: 20px;
}
h1 {
  text-align: center;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

th,
td {
  padding: 10px;
  text-align: left;
}

thead {
  background-color: #f2f2f2;
}

tbody tr:nth-child(even) {
  background-color: #e8e8e8;
}

.form-container {
  max-width: 500px;
  margin: 20px auto;
}

.form-container form {
  display: grid;
  gap: 10px;
}

.form-container label {
  font-weight: bold;
}

.form-container input[type="text"] {
  padding: 5px;
  border-radius: 4px;
  border: 1px solid #ccc;
}
</style>

<body>
  <?php
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
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payment_id = $_POST['payment_id'];
    $order_id = $_POST['order_id'];
     $payment_date = date('Y-m-d'); // Menggunakan tanggal saat ini
    $process = $_POST['process'];

    $query = "INSERT INTO tabel_pay (payment_id, order_id, payment_date, process) VALUES ('$payment_id', '$order_id', '$payment_date', '$process')";
    $result = mysqli_query($conn, $query);

  }

  // Mengambil data dari tabel orderan
  $selectQuery = "SELECT * FROM tabel_pay";
  $selectResult = mysqli_query($conn, $selectQuery);
  ?>

  <h1>Payment Table</h1>

  <div class="form-container">
    <form method="POST">
      <label for="payment_id">Payment ID:</label>
      <input type="text" name="payment_id" id="payment_id" required>

      <label for="order_id">Order ID:</label>
      <input type="text" name="order_id" id="order_id" required>

      <label for="payment_date">Payment Date:</label>
      <input type="text" name="payment_date" id="payment_date" required>

      <label for="process">Process:</label>
      <input type="text" name="process" id="process" required>

      <button type="submit">Submit</button>
    </form>
  </div>

  <table id="paymentTable">
    <thead>
      <tr>
        <th>Payment ID</th>
        <th>Order ID</th>
        <th>Payment Date</th>
        <th>Process</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = mysqli_fetch_assoc($selectResult)) {
        echo "<tr>";
        echo "<td>" . $row['payment_id'] . "</td>";
        echo "<td>" . $row['order_id'] . "</td>";
        echo "<td>" . $row['payment_date'] . "</td>";
        echo "<td>" . $row['process'] . "</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
  <script src="script.js"></script>
</body>
</html>
