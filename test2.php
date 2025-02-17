<?php
// Database connection
include '_dbconnect.php';

// Handle form submission for new banners
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_banner'])) {
    $message = $conn->real_escape_string($_POST['message']);
    $publish_date = $_POST['publish_date'];
    $status = isset($_POST['status']) ? 1 : 0;
    $sql = "INSERT INTO banners (message, publish_date, status) VALUES ('$message', '$publish_date', '$status')";
    $conn->query($sql);
}

// Handle status update via AJAX request
if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = (int) $_POST['id'];
    $status = (int) $_POST['status'];

    // Update the status in the database
    $sql = "UPDATE banners SET status = $status WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Status updated successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch banners
$banners = $conn->query("SELECT * FROM banners ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Banner Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Manage Banners</h2>
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <label for="message" class="form-label">Banner Message</label>
                <input type="text" name="message" id="message" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="publish_date" class="form-label">Publish Date</label>
                <input type="date" name="publish_date" id="publish_date" class="form-control" required>
            </div>
            <div class="form-check">
                <input type="checkbox" name="status" id="status" class="form-check-input">
                <label for="status" class="form-check-label">Enable Banner</label>
            </div>
            <button type="submit" name="add_banner" class="btn btn-primary mt-3">Add Banner</button>
        </form>

        <h4>Banner History</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Publish Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $banners->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['message']); ?></td>
                        <td><?php echo $row['publish_date']; ?></td>
                        <td>
                            <input type="checkbox" class="status-toggle" data-id="<?php echo $row['SN']; ?>" <?php echo $row['status'] ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $row['SN']; ?>">Delete</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Toggle banner status (enable/disable)
            $('.status-toggle').on('change', function () {
                let id = $(this).data('id');
                let status = $(this).is(':checked') ? 1 : 0;
                $.post('', { id: id, status: status }, function (response) {
                    console.log(response); // Optionally log the response
                });
            });

            // Delete banner
            $('.delete-btn').on('click', function () {
                if (confirm('Are you sure?')) {
                    let id = $(this).data('id');
                    $.post('delete_banner.php', { id: id }, function () {
                        location.reload();
                    });
                }
            });
        });
    </script>
</body>
</html>
