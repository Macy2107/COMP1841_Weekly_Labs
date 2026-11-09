<?php
if (!empty($jokes)) {
    foreach ($jokes as $joke): ?>
        <blockquote>
            <?=htmlspecialchars($joke["joketext"],
                    ENT_QUOTES, "UTF-8")?>

            <!-- Display name and email from users -->
            (by <a href="mailto:<?= htmlspecialchars($joke["email"], ENT_QUOTES, "UTF-8");?>">
            <?=htmlspecialchars($joke["name"], ENT_QUOTES, "UTF-8");?></a>)

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

