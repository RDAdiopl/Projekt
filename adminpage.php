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
        <?php include 'adminpanel.php'; ?>
    </div>
<div id="main">
<br><br><br>
<div id="dodaj">
   <form method="POST">
        Dodaj produkty
        <p>Nazwa produktu: <input type="text" name="nazwa"></p>
        <p>Cena produktu: <input type="number" name="cena"></p>
        <p><input type="submit" value="Dodaj" name="click"></p>
    </form>
</div>
<div id="usun">
        Usuń produkty<br><br>
        <?php
            $conn = new mysqli('localhost','root','','sklep');
            $r = $conn->query("SELECT * FROM produkty ;");

            while($row = $r->fetch_assoc())
            {
                echo "<form class='fusun' method='POST'>";
                echo "<div class='pusun'>";
                echo ucfirst($row["produkt"]);
                echo "<input type='hidden' name='produkt' value=".$row["produkt"].">";
                echo " <input type='submit' name='click2' value='X'>";
                echo "</div>";
                echo "</form>";
            }
            $conn->close();  
        ?>
</div>
</div>
</body>
</html>
<?php
if(isset($_REQUEST['click']))
{
    $conn = new mysqli('localhost','root','','sklep');
    $sql = "INSERT INTO produkty (produkt,cena) VALUES ('".$_POST["nazwa"]."',".$_POST["cena"].")";
    $conn->query($sql);
    $conn->close();  
    header("Location: adminpage.php");
}
if(isset($_REQUEST['click2']))
{
    $conn = new mysqli('localhost','root','','sklep');
    $sql = "DELETE FROM produkty WHERE produkt='".$_POST['produkt']."'";
    $conn->query($sql);
    $conn->close();  
    header("Location: adminpage.php");
}
?>