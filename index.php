<?php 
    // Lekezeli a hibás query hibát
    if (isset($_GET['page']))
        
        // Lekérdezi, hogy a felhasználó melyik gombra kattint
        $page = $_GET['page']; 
    else 
        $page = "home"; 
?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Próba</title>
	<link rel="stylesheet"  type="text/css" href="./index.css"/>
</head>
<body>
    <div id="wrapper">
		<div id="header">
            <h1>Az oldal címe</h1>
        </div>
		<div id="nav">
            <?php include_once("inc/menu.php"); ?>
            <ul>
                <?php foreach($pages as $page_id => $page_title) { ?>
                <li>
                    <a <?=($page == $page_id) ? 'class="active"' : '' ?> 
                        href="index.php?page=<?=$page_id ?>"><?=$page_title?>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
		<div id="content">
        <?php
            // Ha nem létezik az oldal, bedobja a 404.php-t
            if(file_exists("inc/" . $page . ".php")) {
                
                // Beilleszti a $page tartalmát
                include_once("inc/" . $page . ".php");
            } else {
                include_once("inc/404.php");
            }
        ?>
		</div>
		<div id="sidebar"></div>
		<div class="clear"></div>
		<div id="footer"></div>
	</div>
</body>
</html>

