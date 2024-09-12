<?php
session_start();

// Koneksi ke database
include 'db.php';

// Menambahkan produk ke keranjang
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['id'];
    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    // Simpan produk ke sesi
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    array_push($_SESSION['cart'], $product);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Keranjang Belanja</h1>
        <nav>
            <a href="index.php">Beranda</a>
        </nav>
    </header>

    <section class="cart">
        <h2>Produk di Keranjang</h2>
        <?php if (!empty($_SESSION['cart'])) { ?>
            <ul>
                <?php foreach ($_SESSION['cart'] as $item) { ?>
                    <li>
                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                        <h3><?php echo $item['name']; ?></h3>
                        <p>Rp <?php echo $item['price']; ?></p>
                    </li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>Keranjang Anda kosong.</p>
        <?php } ?>
    </section>
</body>
</html>
