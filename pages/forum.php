<?php
include '../includes/header.php';
?>

<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Create New Post</h1>
    
    <form action="../backend/addForum.php" method="POST" class="bg-white p-6 rounded-lg shadow">
        <div class="mb-4">
            <label for="judul" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" name="judul" id="judul" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>
        
        <div class="mb-4">
            <label for="isi" class="block text-gray-700 font-bold mb-2">Content</label>
            <textarea name="isi" id="isi" rows="6" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"></textarea>
        </div>
        
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Create Post
            </button>
            <a href="../index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Cancel
            </a>
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>