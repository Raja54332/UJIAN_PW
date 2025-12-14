<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM posts WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    mysqli_query($conn, "UPDATE posts SET judul='$judul', isi='$isi' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Edit Post</h3>

<form method="post">
    <input type="text" name="judul" class="form-control mb-2" value="<?= $row['judul']; ?>" required>
    <textarea name="isi" class="form-control mb-2" required><?= $row['isi']; ?></textarea>
    <button name="update" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>

