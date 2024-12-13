<table border='1px'>
    <tr>
        <th></th> 
        <th>Name</th>
        <th>Email</th>
    </tr>
    <?php 
    $count = 1; 
    foreach($user as $user):  $userHasPosts = userHasPosts($pdo, $user['id']); 
    ?>
    
        <tr>
            <td width="50px"><?= $count++; ?></td> 
            <td width="300px"><?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></td>
            <td width="300px"><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></td>
            <td>
            <?php if ($userHasPosts): ?>
                    
                    <span>Cannot delete, user has post</span>
                <?php else: ?>
                <form action="deleteuser.php" method="post" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="submit" value="Delete">
                </form>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>