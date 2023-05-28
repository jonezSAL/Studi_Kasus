<?php
// Database connection configuration
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'food';
$conn = mysqli_connect($host, $user, $password, $database);

// Check if the connection is successful
if (mysqli_connect_errno()) {
  die('Failed to connect to the database: ' . mysqli_connect_error());
}

// Generate payment_id and order_id
$query = "SELECT MAX(payment_id) AS max_payment_id, MAX(order_id) AS max_order_id FROM tabel_pay";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$max_payment_id = $row['max_payment_id'];
$max_order_id = $row['max_order_id'];
$payment_id = $max_payment_id + 1;
$order_id = $max_order_id + 1;

// Generate payment_date
$payment_date = date('Y-m-d'); // Current date

// Manually input process value
$process = 'Sedang di dapur';

// Insert the new payment record into the "payment" table
$insertQuery = "INSERT INTO tabel_pay (payment_id, order_id, payment_date, process) VALUES ('$payment_id', '$order_id', '$payment_date', '$process')";
$insertResult = mysqli_query($conn, $insertQuery);

if ($insertResult) {
  echo "Payment record inserted successfully!";
} else {
  echo "Failed to insert payment record: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
