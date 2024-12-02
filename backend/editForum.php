<?php
require_once '../config/database.php';
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    
    try {
        $stmt = $pdo->prepare("UPDATE forum SET judul = ?, isi = ? WHERE id = ?");
        $stmt->execute([$judul, $isi, $id]);
        
        header('Location: ../index.php');
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM forum WHERE id = ?");
    $stmt->execute([$id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Edit Post</h1>
    
    <form method="POST" class="bg-white p-6 rounded-lg shadow">
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        
        <div class="mb-4">
            <label for="judul" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" name="judul" id="judul" value="<?php echo htmlspecialchars($post['judul']); ?>" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>
        
        <div class="mb-4">
            <label for="isi" class="block text-gray-700 font-bold mb-2">Content</label>
            <textarea name="isi" id="isi" rows="6" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"><?php echo htmlspecialchars($post['isi']); ?></textarea>
        </div>
        
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update Post
            </button>
            <a href="../index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Cancel
            </a>
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>