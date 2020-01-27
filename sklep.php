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
        $conn = new mysqli('localhost','root','','sklep');
        $r = $conn->query("SELECT * FROM produkty ;");

        while($row = $r->fetch_assoc())
        {
            echo "<form method='POST'>";
            echo "<div class='produkt'>";
            echo "<b>".$row["cena"]." zł</b><br>";
            echo "<input type='hidden' name='produkt' value=".$row["produkt"].">";
            echo ucfirst($row["produkt"]);
            echo "<div>";
            echo "Ilość: <input type='number' name='ilosc' min=0 max=99><br>";
            echo "<input type='submit' name='click2' value='KUP TERAZ'>";
            echo "</div>";
            echo "</div>";
            echo "</form>";
        }

        $conn->close();  
        ?>
    
</div>
</body>
</html>
<?php
if(isset($_REQUEST['click2']))
{
    if(isset($_SESSION["username"]))
    {
            if($_POST["ilosc"]!=0)
            {
            $conn = new mysqli('localhost','root','','sklep');
            $u = $conn->query("SELECT iduser FROM users WHERE login='".$_SESSION["username"]."';");
            $iduser = $u->fetch_assoc();
            $u2 = $conn->query("SELECT idproduktu FROM produkty WHERE produkt='".$_POST["produkt"]."';");
            $idproduktu = $u2->fetch_assoc();
            $sql = "INSERT INTO zamowienia (iduser, idproduktu, ilosc, dnia) VALUES (".$iduser['iduser'].", ".$idproduktu['idproduktu'].", ".$_POST['ilosc'].", '".date("Y-m-d")."');";
            $conn->query($sql);
            $u3 = $conn->query("SELECT cena FROM produkty WHERE produkt='".$_POST["produkt"]."';");
            $cena = $u3->fetch_assoc();
            echo "<script type='text/javascript'>alert('Zapłacono: ".$_POST['ilosc']*$cena['cena']." zł');</script>";
            $conn->close(); 
            }
    }
    else
    {
        echo "<script type='text/javascript'>alert('Zaloguj się!');</script>";
    }
}
?>
