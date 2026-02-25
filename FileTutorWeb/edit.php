<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'");

if (mysqli_num_rows($query) == 0) {
    echo "Data tidak ditemukan!";
    exit;
}

$d = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {

    $judul = $_POST['judul'];
    $sutradara = $_POST['sutradara'];
    $genre = $_POST['genre'];
    $tahun_rilis = $_POST['tahun_rilis'];

    mysqli_query($koneksi, "UPDATE buku SET
        judul='$judul',
        sutradara='$sutradara',
        genre='$genre',
        tahun_rilis='$tahun_rilis'
        WHERE id='$id'
    ");

    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Film</title>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    overflow: hidden;

    /* Background galaxy gradient */
    background: radial-gradient(circle at 20% 30%, #1b2735, transparent 40%),
                radial-gradient(circle at 80% 70%, #090a0f, transparent 40%),
                linear-gradient(135deg, #0f2027, #203a43, #2c5364);
}

/* Card */
.card {
    width: 420px;
    padding: 40px;
    border-radius: 20px;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(15px);
    box-shadow: 0 0 40px rgba(0,0,0,0.7);
    animation: fadeIn 1s ease-in-out;
}

.card h2 {
    text-align: center;
    margin-bottom: 25px;
}

/* Input */
input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 18px;
    border-radius: 8px;
    border: none;
    outline: none;
}

/* Button */
button {
    width: 100%;
    padding: 12px;
    border-radius: 30px;
    border: none;
    font-weight: bold;
    background: linear-gradient(45deg, #00c6ff, #0072ff);
    color: white;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px #00c6ff;
}

.back {
    display: block;
    margin-top: 15px;
    text-align: center;
    color: #ccc;
    text-decoration: none;
}

.back:hover {
    color: white;
}

/* Animasi */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

</head>
<body>

<div class="card">
    <h2>Edit Data Film 🎬</h2>

    <form method="post">
        Judul Film
        <input type="text" name="judul" value="<?php echo $d['judul']; ?>" required>

        Sutradara
        <input type="text" name="sutradara" value="<?php echo $d['sutradara']; ?>" required>

        Genre
        <input type="text" name="genre" value="<?php echo $d['genre']; ?>" required>

        Tahun Rilis
        <input type="number" name="tahun_rilis" value="<?php echo $d['tahun_rilis']; ?>" required>

        <button type="submit" name="update">Update Film</button>
    </form>

    <a href="home.php" class="back">← Kembali ke Home</a>
</div>

</body>
</html>