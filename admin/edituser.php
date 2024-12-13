<?php
include '../includes/DatabaseConnection.php';

$error = ''; // Biến để lưu lỗi

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Kiểm tra tham số `id`
        if (!isset($_POST['id']) || empty(trim($_POST['id']))) {
            throw new Exception('User ID is missing.');
        }

        // Cập nhật thông tin người dùng
        $sql = 'UPDATE user SET name = :name, email = :email WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $_POST['name']);
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $stmt->execute();

        // Chuyển hướng về trang danh sách
        header('Location: users.php');
        exit;
    } catch (PDOException $e) {
        $error = 'Database error: ' . $e->getMessage();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
} else {
    // Xử lý khi truy cập trang qua phương thức GET
    try {
        // Kiểm tra tham số `id`
        if (!isset($_GET['id']) || empty(trim($_GET['id']))) {
            throw new Exception('User ID is missing.');
        }

        // Lấy dữ liệu người dùng
        $sql = 'SELECT * FROM user WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra người dùng có tồn tại không
        if (!$user) {
            throw new Exception('User not found. Please check the ID.');
        }
    } catch (PDOException $e) {
        $error = 'Database error: ' . $e->getMessage();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

// Tiêu đề trang
$title = 'Edit User';

// Giao diện HTML
ob_start();
?>
<h1>Edit User</h1>

<?php if (!empty($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
<?php endif; ?>

<?php if (isset($user) && $user): ?>
    <form action="edituser.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>">
        <label for="name">Username:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>" required><br><br>
        <button type="submit">Save Changes</button>
    </form>
<?php endif; ?>

<?php
$output = ob_get_clean();
include '../template/layout.html.php';
?>
