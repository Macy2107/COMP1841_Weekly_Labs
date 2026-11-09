<?php
if (!empty($jokes)) {
    foreach ($jokes as $joke): ?>
        <blockquote>
            <?=htmlspecialchars($joke["joketext"],
                    ENT_QUOTES, "UTF-8")?>

            <!-- Add form for deleting joke -->
            <form action="deletejoke.php" method="post">
                <input type="hidden" name="id" value="<?=htmlspecialchars($joke["id"])?>">
                <input type="submit" value="Delete">
            </form>
        </blockquote>
    <?php endforeach
    ;?>
    <?php
}
?>

