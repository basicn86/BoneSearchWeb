<?php header('Cache-Control: max-age=300'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="index.css" rel="stylesheet">

    <title>bonesear.ch</title>
</head>
<body>
    
    <main>
        <h1>bonesear<span class="tld">.ch</span></h1>
        <form action="./search.php" method="get">
            <input type="text" id="query" name="query" placeholder="Search here">
            <input type="submit" id="submit" value="Search">
        </form>
    </main>

</body>
</html>