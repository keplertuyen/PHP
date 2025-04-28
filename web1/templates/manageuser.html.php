<div class="Manage Users">
    <h2>Manage User</h2>
    
    <div class="add-form">
        <h3>Add New User</h3>
        <form action="adduser.php" method="POST">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>">
            <input type="text" name="email" value="<?= htmlspecialchars($user['email']) ?>">
            <input type="text" name="role" value="<?= htmlspecialchars($user['role']) ?>">
            <button type="submit" class="save-btn">Save user</button>
    
        </form>
    </div>

    <div class="data-table">
        <table>
            <thead>
                <tr><th>User</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <form action="edituser.php" method="POST" class="edit-form">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>">
                                <input type="text" name="email" value="<?= htmlspecialchars($user['email']) ?>">
                                <input type="text" name="role" value="<?= htmlspecialchars($user['role']) ?>">
                                <button type="submit" class="save-btn">Save</button>
                            </form>
                        </td>

                        <td class="actions">
                            <form action="deleteuser.php" method="POST" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>