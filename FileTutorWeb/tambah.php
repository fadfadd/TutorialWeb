<?php 
include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $judul        = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $sutradara    = mysqli_real_escape_string($koneksi, $_POST['sutradara']);
    $genre        = mysqli_real_escape_string($koneksi, $_POST['genre']);
    $tahun_rilis  = mysqli_real_escape_string($koneksi, $_POST['tahun_rilis']);

    mysqli_query($koneksi,
        "INSERT INTO buku (judul, sutradara, genre, tahun_rilis) 
         VALUES ('$judul', '$sutradara', '$genre', '$tahun_rilis')"
    ) or die(mysqli_error($koneksi));

    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Koleksi Film</title>
    <meta charset="UTF-8">

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #000;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* FILM STRIP */
.film-strip {
    position: fixed;
    width: 200%;
    height: 60px;
    background: repeating-linear-gradient(
        90deg,
        #111 0px,
        #111 40px,
        #222 40px,
        #222 80px
    );
    animation: moveFilm 10s linear infinite;
    z-index: 1;
}
.film-top { top: 0; }
.film-bottom { bottom: 0; }

@keyframes moveFilm {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
}

/* SPOTLIGHT */
.spotlight {
    position: fixed;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
    animation: moveLight 6s ease-in-out infinite alternate;
    z-index: 1;
}

@keyframes moveLight {
    0% { transform: translate(-200px, -200px); }
    100% { transform: translate(600px, 200px); }
}

/* OVERLAY */
.overlay {
    position: fixed;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.7);
    z-index: 2;
}

/* CARD */
.form-card {
    position: relative;
    width: 100%;
    max-width: 450px;
    padding: 40px;
    margin: 0;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    box-shadow: 0 0 40px rgba(0,0,0,0.8);
    color: white;
    z-index: 3;
    animation: fadeIn 1s ease-in-out;
}

.form-card h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 22px;
}

.input-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
}

.input-group label {
    margin-bottom: 8px;
    font-size: 14px;
    color: #ddd;
}

.input-group input {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 10px;
    outline: none;
    font-size: 14px;
}

.btn-primary {
    width: 100%;
    padding: 14px;
    background: #e50914;
    border: none;
    color: white;
    border-radius: 10px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
    margin-top: 10px;
}
.btn-primary:hover {
    box-shadow: 0 0 20px #e50914;
    transform: scale(1.05);
}
.btn-secondary {
    display: block;
    text-align: center;
    margin-top: 12px;
    color: white;
    text-decoration: none;
    opacity: 0.8;
}
.btn-secondary:hover {
    opacity: 1;
}

/* Animasi */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

</head>
<body>

<div class="film-strip film-top"></div>
<div class="film-strip film-bottom"></div>
<div class="spotlight"></div>
<div class="overlay"></div>

<div class="form-card">
    <h2>🎬 Tambah Koleksi Film</h2>

    <form method="post">

        <div class="input-group">
            <label>Judul Film</label>
            <input type="text" name="judul" required>
        </div>

        <div class="input-group">
            <label>Sutradara</label>
            <input type="text" name="sutradara" required>
        </div>

        <div class="input-group">
            <label>Genre</label>
            <input type="text" name="genre" required>
        </div>

        <div class="input-group">
            <label>Tahun Rilis</label>
            <input type="number" name="tahun_rilis" required>
        </div>

        <button type="submit" name="simpan" class="btn-primary">
            🎬 Simpan Film
        </button>

        <a href="home.php" class="btn-secondary">← Kembali ke Dashboard</a>

    </form>
</div>

</body>
</html>