<?php
include 'header.php';
include 'db.php'; // Database connection file

// Deletion handling
if (isset($_POST['delete'])) {
    $string_id = $_POST['string_id'];

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM string_info WHERE string_id = ?");
    $stmt->bind_param("i", $string_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch all records
$result = $conn->query("SELECT string_id, message FROM string_info");
?>
    <h1>All Records</h1>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?php echo "ID: " . $row['string_id'] . " - Message: " . $row['message']; ?></li>
        <?php endwhile; ?>
    </ul>
    <form action="showAll.php" method="POST">
        <input type="number" name="string_id" required>
        <button type="submit" name="delete">Delete</button>
    </form>
</body>
</html>
