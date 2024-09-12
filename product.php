<?php
// Koneksi ke database
include 'db.php';

// Mengambil id produk dari URL
$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - Detail Produk</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><?php echo $product['name']; ?></h1>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="cart.php">Keranjang</a>
        </nav>
    </header>

    <section class="product-detail">
        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        <h2><?php echo $product['name']; ?></h2>
        <p>Harga: Rp <?php echo $product['price']; ?></p>
        <p><?php echo $product['description']; ?></p>
        <form action="cart.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <input type="submit" value="Tambahkan ke Keranjang" class="btn">
        </form>
    </section>
</body>
</html>
