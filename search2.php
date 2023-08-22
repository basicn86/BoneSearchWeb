<?php header('Cache-Control: no-cache'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="search2.css" rel="stylesheet">

    <title>bonesear.ch</title>
</head>
<body>
    <header>
        <div class="search-bar">
            <h1>bonesear<span class="tld">.ch</span></h1>
            <form action="./search.php" method="get">
                <input type="text" id="query" name="query" placeholder="Search here" value="<?php if(isset($_GET['query'])) echo $_GET['query']; ?>">
                <input type="submit" id="submit" value="Search">
            </form>
        </div>
    </header>

    <main>
        <div class="grid-container">
        <?php
            for($i = 0; $i < 10; $i++){
            echo '<div class="left-nav">
            <p class="score">10.0</p>
            <div style="clear: both; height: 4px;"></div>
            <p class="category">Category</p>
            </div>';
            echo '<div class="search-result">';
            echo '<a href="#"><div>';
            echo '<span class="search-result-title">example title</span>';
            echo '<br>';
            echo '<p class="search-result-website">example.com/url</p>';
            echo '</div></a>';
            echo '<p class="search-result-meta">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat quis, officiis incidunt aliquid laudantium doloremque doloribus dignissimos alias pariatur voluptates!</p>';
            echo '</div>';
            echo '<div></div>';
            }
        ?>
        </div>

        <?php
        /* EXAMPLE SEARCH RESULT
        <div class="search-result">
            <a href="#"><div>
                <span class="search-result-title">This is an example result.</span>
                <br>
                <p class="search-result-website">www.example.com/verylongurl/verylongurl/verylongurl/verylongurl/verylongurl/verylongurl/verylongurl/verylongurl/</p>
            </div></a>
            <p class="search-result-meta">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur blanditiis incidunt culpa nesciunt libero reiciendis ipsa repellendus possimus beatae. Voluptate soluta alias reiciendis quos quasi pariatur veritatis dolor hic provident?</p>
        </div>*/
        ?>
    </main>
</body>
</html>