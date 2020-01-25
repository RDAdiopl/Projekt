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
        <input type="button" class="button" value="Produkty" onclick="location.href='adminpage.php'">
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
    <div id="usun">
        <h1>Usuń</h1>
        <form method="post">
        <input type="text" name="nazwa1" maxlength=16>
        <input type="submit" name="click1" value="Usuń">
        <?php
        $conn = new mysqli('localhost','root','','sklep');
        $r = $conn->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='sklep' AND TABLE_NAME='zakupy';");

        while($row = $r->fetch_assoc())
        {
            if ($row["COLUMN_NAME"]!="id" && $row["COLUMN_NAME"]!="user")
            {
                echo "<div class='zdj'>".$row["COLUMN_NAME"]."</div>";
            }
        }
        $conn->close();  
        ?>
        </div>
        </form>
    </div>
    <div id="dodaj">
        <h1>Dodaj</h1>
        <form method="post">
            <input type="text" name="nazwa2" maxlength=16>
            <input type="submit" name="click2" value="Dodaj">
        </form>
    </div>
</div>
</body>
</html>

<?php
if (isset($_POST['wyloguj'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: main.php");
}
if(isset($_REQUEST['click1']))
{
    if ($_POST['nazwa1']== "id" || $_POST['nazwa1']== "user")
    {
        echo "<script type='text/javascript'>alert('Błąd!');</script>";
    }
    else
    {
        $conn = new mysqli('localhost','root','','sklep');
        $sql = "ALTER TABLE  zakupy DROP COLUMN ".$_POST['nazwa1'].";";
        $conn->query($sql); 
        header("Location: adminpage.php");
        $conn->close();  
    }
} 
if(isset($_REQUEST['click2']))
{
    $conn = new mysqli('localhost','root','','sklep');
    $sql = "ALTER TABLE zakupy ADD ".$_POST['nazwa2']." int;";
    $conn->query($sql); 
    header("Location: adminpage.php");
    $conn->close();  
} 
?>