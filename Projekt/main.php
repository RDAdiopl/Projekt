<?php
session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Przykładowy Sklep</title>
</head>
<body>
    <div id="menu">
        <form method="post">
        <input type="button" class="button" value="Strona główna" onclick="location.href='main.php'">
        <input type="button" class="button" value="Produkty" onclick="location.href='sklep.php'">
        <input type="button" class="button2" value="Login" onclick="location.href='logowanie.php'"
        <?php if(isset($_SESSION["username"])) {
        echo "style='display: none;'";}
        else {
        echo "style='display: block;'";
        }
        ?>> 
        <input type="button" class="button2" value="Rejestracja" onclick="location.href='rejestracja.php'"
        <?php if(isset($_SESSION["username"])) {
        echo "style='display: none;'";}
        else {
        echo "style='display: block;'";
        }
        ?>> 
        <input type="submit" class="button2" name="wyloguj" value="Wyloguj" 
        <?php if(isset($_SESSION["username"])) {
        echo "style='display: block;'";}
        else {
        echo "style='display: none;'";
        }
        ?>> 
        </form>
    </div>
    <br><br>
<div id="main">
    <h1>Witamy w sklepie!</h1>
</div>
</body>
</html>

<?php
if (isset($_POST['wyloguj'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: main.php");
}
if(isset($_SESSION["username"])) {
    echo "Zalogowano jako ".$_SESSION["username"]; 
}


?>