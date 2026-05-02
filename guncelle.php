<?php
include("config.php");


if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    
    $stmt = $baglanti->prepare("UPDATE ogrenciler SET giris_saat = NOW() WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}


header("Location: index.php");
exit;
?>
