<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO forum (id_pembuat, judul, isi) VALUES (1, ?, ?)");
        $stmt->execute([$judul, $isi]);
        
        header('Location: ../index.php');
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>