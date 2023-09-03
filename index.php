<?php header('Cache-Control: max-age=300'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="styles/index.css" rel="stylesheet">
    <link href="styles/topnav.css" rel="stylesheet">
    <link href="styles/footer.css" rel="stylesheet">

    <title>bonesear.ch</title>

    <meta name="description" content="The next generation search engine.">

    <?php include("include/gtag.include"); ?>
</head>
<body>
    <header>
        <?php include("include/topnav.html"); ?>
    </header>    

    <main>
        <h1>bonesear<span class="tld">.ch</span></h1>
        <span class="version">Public Beta 3.2</span>
        <form action="./search.php" method="get">
            <input type="text" id="query" name="query" placeholder="Search here">
            <input type="submit" id="submit" value="Search">
        </form>
    </main>

    <?php include("include/footer.html") ?>
</body>
</html>