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
    <br><br><br><br>
<div id="main">
    <form name="test" method="post">
    <?php
    $conn = new mysqli('localhost','root','','sklep');
    $r = $conn->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='sklep' AND TABLE_NAME='zakupy';");

    while($row = $r->fetch_assoc())
    {
        if ($row["COLUMN_NAME"]!="id" && $row["COLUMN_NAME"]!="user")
        {
            echo "<div class='zdj'>".$row["COLUMN_NAME"]."<input type=number name='test[".$row["COLUMN_NAME"]."]' value=0 min=0></div>";
        }
    }
    
    $conn->close();  
    ?>
    </div>
    <input type="submit" name="click" value="Dokonaj zakupu">
    </form>
</div>
</body>
</html>
<?php
if(isset($_REQUEST['click']))
{
    if(isset($_SESSION["username"]))
    {
            if(array_sum($_POST["test"])!=0)
            {
            $conn = new mysqli('localhost','root','','sklep');
            $columns = join(", ", array_keys($_POST["test"]));

            $rows = join(", ", $_POST["test"]);

            $sql = "INSERT INTO zakupy (user, ".$columns.") VALUES ('".$_SESSION["username"]."', ".$rows.")";
            $conn->query($sql);
            echo "<br>Dokonano zakupu!"; 
            }
            else
            {
                echo "<br>Nic nie wybrano!"; 
            }
    }
    else
    {
        echo "Zaloguj się!";
    }
} 
if (isset($_POST['wyloguj'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: sklep.php");
}
?>
