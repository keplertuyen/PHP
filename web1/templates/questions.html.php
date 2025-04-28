<p><?=$totalQuestions?> Questions have been submitted to the Internet Question Database. </p>

<?php
foreach($questions as $question): ?>
    <blockquote>
    <?=htmlspecialchars($question['questiontext'], ENT_QUOTES, 'UTF-8' )?>
    <br /><?=htmlspecialchars($question['moduleName'], ENT_QUOTES, 'UTF-8');?>

    (by <a href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8');?>">
    <?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8'); ?></a>)

    <a href="editquestion.php?id=<?=$question['id']?>">Edit</a>


    <?php if (!empty($question['image'])) : ?>
        <img height="100px" src="images/<?= htmlspecialchars($question['image']); ?>" alt="Question Image">
    <?php else : ?>
          No any picture
    <?php endif; ?>
    <form action="deletequestion.php" method="post">
        <input type='hidden' name='id' value='<?=$question['id']?>'>
        <input type="submit" value="Delete">
    </form>

    <form action="deletequestion.php" method="post"></form>
    </blockquote>
    <?php endforeach;?>