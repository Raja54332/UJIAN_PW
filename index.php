<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Blog Sederhana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2 class="mb-3">Blog Sederhana</h2>

<a href="tambah.php" class="btn btn-primary mb-3">Tambah Post</a>

<?php
$data = mysqli_query($conn, "SELECT * FROM posts ORDER BY id DESC");
while ($row = mysqli_fetch_assoc($data)) {
?>
<div class="card mb-3">
    <div class="card-body">
        <img src="img/<?= $row['gambar']; ?>" class="img-fluid mb-2 rounded">
        <h5><?= $row['judul']; ?></h5>
        <p><?= $row['isi']; ?></p>
        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
           onclick="return confirm('Yakin hapus data?')">Hapus</a>
    </div>
</div>
<?php } ?>

</body>
</html>
