<!-- Parse the error -->
<?php if(isset($error)): ?>
    <p><?=$error?></p>

<?php else:
    // Surrounded with if !empty to remove in-case sensitivity
    if (!empty($jokes)) {
        foreach ($jokes as $joke): ?>
        <blockquote>
            <?=htmlspecialchars($joke["joketext"],
                    ENT_QUOTES, "UTF-8")?>
        </blockquote>
        <?php endforeach;
    }
                   endif;
                       ?>

