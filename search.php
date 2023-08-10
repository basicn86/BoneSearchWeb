<?php header('Cache-Control: max-age=300'); ?>
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
            <form action="./search.php" method="get">
                <input type="text" id="query" name="query" placeholder="Search here">
                <input type="submit" id="submit" value="Search">
            </form>
        </div>
    </header>

    <main>
        <?php
            function GetSearchResults($terms){
                $url = 'http://localhost:5222/search?terms=' . $terms;
            
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                
                curl_close($ch);

                if($response === false) return null;

                return $response;
            }

            if(isset($_GET["query"])){

                $json = GetSearchResults($_GET["query"]);
                $json = json_decode($json);

                if(count($json) == 0){
                    echo '<h2 class="no-result">No results found</h2>';
                }

                foreach($json as $j){
                    $title = $j->title;
                    $url = $j->domain . '/' . $j->path;
                    $protocol = '';

                    if($j->https){
                        $protocol="https://";
                    } else {
                        $protocol="http://";
                    }
                    
                    echo '<div class="search-result">';
                    echo '<a href="' . $protocol . $url .'"><div>';
                    echo '<span class="search-result-title">' . $title . "</span>";
                    echo '<br>';
                    echo '<p class="search-result-website">' . $url . "</p>";
                    echo '</div></a>';
                    echo '</div>';
                }
            }
        ?>

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