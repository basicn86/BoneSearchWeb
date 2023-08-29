<?php header('Cache-Control: max-age=300'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="index.css" rel="stylesheet">
    <link href="topnav.css" rel="stylesheet">

    <title>bonesear.ch</title>

    <meta name="description" content="The next generation search engine.">

    <?php include("gtag.include"); ?>
</head>
<body>
    <header>
        <nav class="top-nav">
            <ul class="top-nav-ul">
                <li><a href="#">Home</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </nav>
    </header>    

    <main>
        <h1>bonesear<span class="tld">.ch</span></h1>
        <span class="version">Public Beta 3.0</span>
        <form action="./search.php" method="get">
            <input type="text" id="query" name="query" placeholder="Search here">
            <input type="submit" id="submit" value="Search">
        </form>
    </main>

</body>
</html>