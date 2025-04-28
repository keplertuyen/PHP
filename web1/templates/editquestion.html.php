<form action="" method="post">
    <input type="hidden" name="questionid" value="<?= htmlspecialchars($question['id']) ?>">

    <label for="questiontext">Edit your question here:</label><br>
    <textarea name="questiontext" rows="3" cols="40"><?= htmlspecialchars($question['questiontext']) ?></textarea><br><br>

    <label for="image">Current image:</label><br>
    <?php if (!empty($question['image'])): ?>
        <img src="<?= htmlspecialchars($question['image']) ?>" alt="Current image" style="max-width: 200px; display: block; margin-bottom: 10px;">
    <?php else: ?>
        <p>No image available.</p>
    <?php endif; ?>

    <label for="image">Edit your image link here:</label><br>
    <textarea name="image" rows="3" cols="40"><?= htmlspecialchars($question['image']) ?></textarea><br><br>

    <input type="submit" name="submit" value="Save">
</form>
