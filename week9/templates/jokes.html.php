<!-- Fixed: Define joke and totalJokes as variables -->
<?php /** @var array $joke */ ?>
<?php /** @var array $totalJokes */ ?>
    <p><?=$totalJokes?> jokes have been submitted to My's Internet Joke Database</p>
<?php
if (!empty($jokes)) {
    foreach ($jokes as $joke): ?>
        <blockquote>
            <?=htmlspecialchars($joke["joketext"],
                    ENT_QUOTES, "UTF-8")?>

            <!-- New code added -->
            <?=htmlspecialchars($joke["name"], ENT_QUOTES, "UTF-8");?>

            <!-- Added pic -->
            <?=htmlspecialchars($joke["pic"] ?? "", ENT_QUOTES, "UTF-8");?>
            <?php if (!empty($joke['pic'])): ?>
                <img src="<?= htmlspecialchars($joke['pic'], ENT_QUOTES, 'UTF-8') ?>"
                     alt="Picture" style="max-width:150px;">
            <?php endif; ?>
            <!-- Fixed: Added htmlspecialchars  -->
            <a href="editjoke.php?id=<?=htmlspecialchars($joke["id"], ENT_QUOTES, "UTF-8")?>">Edit</a>

            <form action="deletejoke.php" method="post">

            <!-- Display name and email from users -->
            (by <a href="mailto:<?= htmlspecialchars($joke["email"], ENT_QUOTES, "UTF-8");?>">
            <?=htmlspecialchars($joke["name"], ENT_QUOTES, "UTF-8");?></a>)

            <!-- Add form for deleting joke -->
            <form action="deletejoke.php" method="post">
                <input type="hidden" name="id" value="<?=htmlspecialchars($joke["id"])?>">
                <input type="submit" value="Delete">
            </form>
        </blockquote>
    <?php endforeach;?>

    <?php
}
?>