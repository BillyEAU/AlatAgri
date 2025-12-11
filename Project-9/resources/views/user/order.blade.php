<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Produk</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <header class="top-header">
        <strong class="title">AlatAgri</strong>
    </header>

    <h1 class="center-title">Form Pemesanan</h1>

    <div class="order-box">
        <h2 id="product-name"></h2>
        <p id="product-price"></p>

        <form action="{{ route('user.storeOrder', $order->id) }}" method="POST">
            @csrf
            <label>Nama Pembeli</label>
            <input type="text" placeholder="Nama lengkap" name="customer_name">

            <label>Alamat</label>
            <input type="text" placeholder="Alamat lengkap" name="customer_address">

            <label>Nomor Telepon</label>
            <input type="text" placeholder="Alamat lengkap" name="customer_phone">

            <label>Jumlah</label>
            <input type="number" min="1" value="1" name="quantity">

            <button type="submit" class="btn">Pesan Sekarang</button>
        </form>
    </div>

    <footer class="footer">
        <p>&copy; 2025 AlatAgri</p>
    </footer>

    <script src="js/data.js"></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const product_id = parseInt(urlParams.get("product_id"));

        const p = products.find(x => x.id === product_id);

        document.getElementById("product-name").innerText = p.name;
        document.getElementById("product-price").innerHTML = `Harga: <b>Rp ${p.price.toLocaleString()}</b>`;
    </script>

</body>

</html>
