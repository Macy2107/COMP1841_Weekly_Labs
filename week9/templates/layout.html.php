<?php /** @var string $title */ /** @var string $output */ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width , initial-scale= 1.0">
      <link rel="stylesheet" href="jokes.css">
      <title><?=$title?></title>
  </head>
 <body>
   <header>
       <h1>My's Internet Joke Database</h1>
   </header>
   <nav>
       <ul>
           <li><a href="index.php">Home</a></li>
           <li><a href="jokes.php">Joke Lists</a></li>
           <!-- Changed from addjoke to editjoke -->
           <li><a href="editjoke.php">Edit your joke</a></li>
       </ul>
   </nav>
   <main>
       <?=$output?>
   </main>
 <footer>
     &copy; MIJD 2026
     <br>
     University of Greenwich Vietnam - HCM Campus
     <br>
     Student: Bui Huynh Hai My (ID:001512587)
     <br>
     Department of Computing
 </footer>
</body>
</html>
