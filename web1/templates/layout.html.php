<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="question.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header>
            <h1>Questions Page</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="question.php">Questions List</a></li>
                <li><a href="addquestion.php">Add A New Question</a></li>
                <li><a href="controlpanel.php">Control Panel</a></li>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; HDTU 2023</footer>
    </body>
</html>