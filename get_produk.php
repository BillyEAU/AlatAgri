<?php
include 'koneksi.php';

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    $sql = "select * from tbl_produk where id_produk = $id_produk LIMIT 1";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Failed to retrieve category data.']);
    }
} else {
    echo json_encode(['error' => 'Category ID not provided.']);
}
?>
