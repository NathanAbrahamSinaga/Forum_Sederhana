<?php
require_once 'config/database.php';
include 'includes/header.php';

$stmt = $pdo->query("SELECT * FROM forum ORDER BY tanggal_dibuat DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="mb-6">
    <h1 class="text-3xl font-bold mb-4">Diskusi Forum</h1>
    <a href="pages/forum.php" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Forum</a>
</div>

<div class="grid gap-4">
    <?php foreach ($posts as $post): ?>
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($post['judul']); ?></h2>
        <p class="text-gray-600 mb-4">
            Posted on <?php echo date('F j, Y, g:i a', strtotime($post['tanggal_dibuat'])); ?>
        </p>
        <p class="text-gray-800 mb-4"><?php echo nl2br(htmlspecialchars($post['isi'])); ?></p>
        <div class="flex gap-2">
            <a href="backend/editForum.php?id=<?php echo $post['id']; ?>" class="text-blue-500 hover:underline">Edit</a>
            <a href="backend/deleteForum.php?id=<?php echo $post['id']; ?>" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php include 'includes/footer.php'; ?>