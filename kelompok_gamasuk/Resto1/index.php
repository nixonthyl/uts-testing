<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mangan Uenak</title>
  <style>
    /* Reset dasar */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Helvetica Neue', sans-serif;
      background-color: #f4f4f4;
      color: #000;
    }

    /* Container utama */
    .hero-section {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 60px 80px;
      min-height: 100vh;
      background-color: #f4f4f4;
    }

    /* Bagian kiri - Teks */
    .hero-text {
      max-width: 50%;
    }

    .hero-text img {
      width: 40px;
      margin-bottom: 20px;
    }

    .hero-text h1 {
      font-size: 60px;
      font-weight: 900;
      margin-bottom: 20px;
      line-height: 1.1;
    }

    .hero-text p {
      font-size: 20px;
      color: #333;
      margin-bottom: 30px;
    }

    /* Tombol */
    .order-btn {
      display: inline-block;
      background-color: #c70000;
      color: white;
      padding: 15px 30px;
      border-radius: 30px;
      font-weight: bold;
      text-decoration: none;
      font-size: 16px;
      transition: background 0.3s ease;
    }

    .order-btn:hover {
      background-color: #a60000;
    }

    /* Bagian kanan - Gambar */
    .hero-image img {
      max-width: 750;
      width: 100%;
      border-radius: 50%;
      object-fit: cover;
    }

    /* Responsive */
    @media (max-width: 900px) {
      .hero-section {
        flex-direction: column;
        text-align: center;
        padding: 40px 20px;
      }

      .hero-text {
        max-width: 100%;
      }

      .hero-image {
        margin-top: 30px;
      }
    }
  </style>
</head>
<body>

  <section class="hero-section">
    <div class="hero-text">
      <img src="img/logo.png" alt="Logo">
      <h1>Mangan<br>Uenak</h1>
      <p>Makan enak tanpa Pergi Kemana-mana</p>
      <a href="login.php" class="order-btn">Pesen dong bang</a>
    </div>
    <div class="hero-image">
      <img src="img/rendang.jpg" alt="rendang">
    </div>
  </section>

</body>
</html>