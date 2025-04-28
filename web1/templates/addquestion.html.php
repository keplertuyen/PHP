<form action="" method="post">
    <label for="questiontext">Type your question here:</label>
    <textarea name="questiontext" rows="3" cols="40"></textarea>

    <label for="image">Add your image here:</label>
    <textarea name="image" rows="2" cols="40"></textarea>
    
    <select name="posts">
        <option value="">select an post</option>
        <?php foreach ($posts as $post):?>
            <option value="<?=htmlspecialchars($post['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($post['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach;?>
    </select>

    <select name="categories">
        <option value="">select a module</option>
        <?php foreach ($categories as $module):?>
            <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach;?>
    </select>

    <input type="submit" name="submit" value="Add">

</form>