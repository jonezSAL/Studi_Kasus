<!DOCTYPE html>
<html>

<head>
    <title>Tabel Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    .img {
        width: 50px;
        height: 50px;
    }

    .container {
        margin-top: 50px;
        background-color: #f2f2f2;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-primary:focus,
    .btn-primary.focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
    }

    .table td,
    .table th {
        vertical-align: middle;
    }
    </style>

</head>

<body>
    <div class="container">
        <h2 class="mb-3">Orderan</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Menu ID</th>
                    <th>Harga</th>
                    <th>Rating</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $hostName = "localhost";
                $userName = "root";
                $password = "";
                $dbName = "food";
                $conn = new mysqli($hostName, $userName, $password, $dbName);

                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM orderan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["menu_id"] . "</td>";
                        echo "<td>" . $row["harga"] . "</td>";
                        echo "<td>" . $row["ongkos"] . "</td>";
                        echo "<td>" . $row["alamat"] . "</td>";
                        echo "<td><a href='#' class='btn btn-primary'>Ambil Orderan</a></td>";
                        echo "</tr>";
                    }

                } else {
                    echo "<tr><td colspan='5'>Data tidak ditemukan.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Event handler untuk tombol "Ambil Orderan"
        $(".btn-primary").click(function() {
            var row = $(this).closest("tr");
            var menuId = row.find("td:first").text();
            var harga = row.find("td:eq(1)").text();
            var ongkos = row.find("td:eq(2)").text();
            var alamat = row.find("td:eq(3)").text();

            // Lakukan apa pun yang diperlukan dengan nilai-nilai tersebut, misalnya melakukan pengolahan atau pengiriman ke halaman lain

            // Contoh: Tampilkan alert dengan informasi yang diambil
            alert("Menu ID yang diambil: " + menuId);
            alert("Menu lokasi: " + alamat);
            alert("Dengan harga: " + harga);
            alert("Ongkos kirim: " + ongkos);
        });
    });
    </script>
</body>

</html>
