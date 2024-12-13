<form action="edituser.php" method="post">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <label for="name">Username:</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?>" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>" required><br>
    <button type="submit">Update User</button>
</form>
