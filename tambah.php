<?php include 'koneksi.php'; ?>

<?php
if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $isi   = $_POST['isi'];

    // ambil file gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    // pindahkan gambar ke folder img
    move_uploaded_file($tmp, "img/".$gambar);

    // simpan ke database
    mysqli_query($conn,
        "INSERT INTO posts (judul, isi, gambar)
         VALUES ('$judul', '$isi', '$gambar')"
    );

    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Tambah Post</h3>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="judul" class="form-control mb-2" placeholder="Judul" required>
    <input type="file" name="gambar" class="form-control mb-3" required>

    <textarea name="isi" class="form-control mb-2" placeholder="Isi" required></textarea>
    <button name="simpan" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>
