<?php require_once('includes/config.inc.php');

if (!empty($_GET['ID'])) {

    try {
        $pdo = new PDO(DBCONNSTRING);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //write sql
        $statement = $pdo->query("SELECT * FROM songs");
        //run sql
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        //show on screen
        var_dump($rows);

        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single song</title>
    <link rel="stylesheet" href="css/single-page.css">
</head>

<body>
    <header>
        <h2>COMP 3512 ASG1<h2>
                <i>Justin Pope</i>
                <div class="nav">
                    <a href="index.php">Home</a>
                    <a href="search.php">Search</a>
                    <a href="browse.php">Browse</a>
                    <a href="favorites.php">Favorites</a>
                </div>
    </header>

    <h1>Song information</h1>

    <footer>FOOTER</footer>
</body>

</html>