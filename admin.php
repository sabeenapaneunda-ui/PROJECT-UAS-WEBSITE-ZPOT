<?php
session_start();
include 'koneksi.php';
$admin_username = "zpotsukses";

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: index.php");
    exit();
}

if ($_SESSION['username'] !== $admin_username) {
    echo "<script>
            alert('Akses Ditolak! Halaman ini khusus Admin.');
            window.location.href = 'index.php';
          </script>";
    exit();
}

$signup_data = mysqli_query($conn, "SELECT signup_log.*, users.fullname 
                                    FROM signup_log 
                                    JOIN users ON signup_log.user_id = users.id 
                                    ORDER BY created_at DESC");

$signin_data = mysqli_query($conn, "SELECT signin_log.*, users.fullname, users.username 
                                    FROM signin_log 
                                    JOIN users ON signin_log.user_id = users.id 
                                    ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Admin Dashboard - Logs</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background: #f4f4f4;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #5E2C0E;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .badge {
            background: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
        }

        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="index.php" class="back-btn">← Kembali ke Website</a>
        <h1>Admin Dashboard</h1>
        <p>Selamat datang, <b><?php echo $_SESSION['username']; ?></b></p>
        <hr>

        <h2>📋 Data Sign Up (Pendaftaran Baru)</h2>
        <table>
            <thead>
                <tr>
                    <th>Waktu Daftar</th>
                    <th>Nama User</th>
                    <th>Email Terdaftar</th>
                    <th>Password (Input Awal)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($signup_data)) { ?>
                    <tr>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <h2>🔑 Data Sign In (Riwayat Login)</h2>
        <table>
            <thead>
                <tr>
                    <th>Waktu Login</th>
                    <th>Username</th>
                    <th>Nama User</th>
                    <th>Password yang Dipakai</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($signin_data)) { ?>
                    <tr>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>