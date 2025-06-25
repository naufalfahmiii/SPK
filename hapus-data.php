<?php
include 'includes/koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Hapus dari hasil_akhir terlebih dahulu
    $query0 = "DELETE FROM hasil_akhir WHERE id_alternatif = ?";
    $stmt0 = $conn->prepare($query0);
    $stmt0->bind_param("i", $id);
    $stmt0->execute();

    // Hapus dari alternatif
    $query1 = "DELETE FROM alternatif WHERE id_alternatif = ?";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("i", $id);
    $stmt1->execute();

    // Hapus dari data_mentah
    $query2 = "DELETE FROM data_mentah WHERE id_data = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("i", $id);
    $stmt2->execute();

    // Proses ulang ARAS
    include 'proses-aras.php';

    // Redirect
    header("Location: alternatif.php");
    exit;
} else {
    echo "ID tidak ditemukan.";
}
?>
