<!--Fixed: Tells PHP that the variable is existed -->
<?php /** @var array $joke */ ?>
<form action="editjoke.php" method="post">
    <!-- Fixed: Added htmlspecialchars, ENT_QUOTEs, UTF-8 -->
    <input type="hidden" name="jokeid" value="<?=$joke["id"] ??"" ?>">

    <label for="pic">Picture: </label>
    <input type="text" name="pic" value="<?= htmlspecialchars($joke['pic'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

    <label for="joketext">Edit joke here: </label>
    <textarea name="joketext" rows="3" cols="40"><?=htmlspecialchars($joke["joketext"] ?? "", ENT_QUOTES, "UTF-8")?>
    </textarea>


    <input type="submit" name="submit" value="Save">
</form>



