<?php header('Cache-Control: no-cache'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="search.css" rel="stylesheet">

    <title>bonesear.ch</title>
</head>
<body>
    <header>
        <div class="search-bar">
            <h1>bonesear<span class="tld">.ch</span></h1>
            <span class="version">Public Beta 2.0</span>
            <form action="./search.php" method="get">
                <input type="text" id="query" name="query" placeholder="Search here" value="<?php if(isset($_GET['query'])) echo $_GET['query']; ?>">
                <input type="submit" id="submit" value="Search">
            </form>
        </div>
    </header>

    <main>
        <div class="grid-container">
        <?php
            function GetSearchResults($terms){
                $url = 'http://localhost:5000/search?terms=' . $terms;
            
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                
                curl_close($ch);

                if($response === false) return null;

                return $response;
            }

            if(isset($_GET["query"])){

                $json = GetSearchResults(rawurlencode($_GET["query"]));
                $json = json_decode($json);

                if(count($json) == 0){
                    echo '<h2 class="no-result">No results found</h2>';
                }

                foreach($json as $j){
                    $title = $j->title;
                    $metadesc = $j->metadesc;
                    $url = $j->domain . '/' . $j->path;
                    $protocol = '';
                    $category = $j->category;

                    if($j->https){
                        $protocol="https://";
                    } else {
                        $protocol="http://";
                    }
                    
                    echo '<div class="left-nav">
                    <div class="upvote"><a href="#">&#9650;</a></div>
                    <div class="score">score</div>
                    <div class="downvote"><a href="#">&#9660;</a></div>
                    <div class="category">' . $category . '</div>
                    </div>';
                    echo '<div class="search-result">';
                    echo '<a href="' . $protocol . $url .'"><div>';
                    echo '<span class="search-result-title">' . $title . "</span>";
                    echo '<br>';
                    echo '<p class="search-result-website">' . $url . "</p>";
                    echo '</div></a>';
                    echo '<p class="search-result-meta">' . $metadesc . '</p>';
                    echo '</div>';

                    echo '<div></div>';
                }
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