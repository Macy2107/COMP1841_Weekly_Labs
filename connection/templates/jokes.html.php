<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Chickens' Jokes</title>
</head>
<body>
    <!-- If/else conditional statements -->
    <?php if(isset($error)): ?>
     <p><?=$error?></p>
     <?php else:
        if (!empty($jokes)) {
            // Use foreach to fetch the SQL queries from joketext columns
            foreach ($jokes as $joke):  ?>
         <p><?=htmlspecialchars($joke["joketext"],
                     ENT_QUOTES, "UTF-8")?></p>

            <form action="deletejoke.php" method="post">
                <input type="hidden" name="id" value="<?=$joke["id"]?>">
                <input type="submit" value="Delete">
            </form>
         <?php endforeach;
        }
         endif;
        ?>
</body>
</html>
