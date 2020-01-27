<?php
session_start();
?>
<html>
<head>
    <?php include 'settings.php'; ?>
</head>
<body>
    <?php include 'panel.php'; ?>
<div id="main">
    <br><br><br><br>
    <?php
    if(isset($_SESSION["username"])) 
    {
        echo "<h1>Zalogowano jako ".$_SESSION["username"]."</h1>";
    }
    else 
    {
        echo "<h1>Żeby korzystać z naszych usług prosimy się zalogować</h1>";
    }
    
    ?>
</div>
</body>
</html>