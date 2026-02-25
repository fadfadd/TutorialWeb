<!DOCTYPE html>
<html>
<head>
<title>Selamat Datang</title>

<style>
body {
    margin: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', sans-serif;
    color: white;
    overflow: hidden;

    /* GRADASI GALAKSI */=
    background: radial-gradient(circle at 20% 30%, #1b2735, transparent 40%),
                radial-gradient(circle at 80% 70%, #090a0f, transparent 40%),
                linear-gradient(135deg, #0f2027, #203a43, #2c5364);
}

/* Efek bintang kecil */
body::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background-image: radial-gradient(white 1px, transparent 1px);
    background-size: 3px 3px;
    opacity: 0.15;
}

/* HERO CONTAINER */
.hero {
    text-align: center;
    z-index: 2;
    animation: fadeIn 1.8s ease-in-out;
}

/* JUDUL */
.hero h1 {
    font-size: 60px;
    margin-bottom: 15px;
    letter-spacing: 2px;
    background: linear-gradient(90deg, #00c6ff, #ffffff, #00c6ff);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shine 5s linear infinite;
}

/* SUBTITLE */
.hero p {
    font-size: 18px;
    opacity: 0.8;
    margin-bottom: 35px;
}

/* BUTTON */
.btn {
    padding: 15px 35px;
    background: linear-gradient(45deg, #00c6ff, #0072ff);
    color: white;
    text-decoration: none;
    border-radius: 30px;
    font-weight: bold;
    transition: 0.4s;
    box-shadow: 0 0 20px rgba(0, 198, 255, 0.6);
}

.btn:hover {
    transform: scale(1.1);
    box-shadow: 0 0 35px rgba(0, 198, 255, 1);
}

/* ANIMASI */
@keyframes shine {
    to {
        background-position: 200% center;
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
</head>

<body>

<div class="hero">
    <h1>Selamat Datang di<br>Koleksi Film 🚀</h1>
    <p>Nikmati pengalaman menonton dengan tampilan modern dan elegan</p>
    <a href="home.php" class="btn">Masuk</a>
</div>

</body>
</html>