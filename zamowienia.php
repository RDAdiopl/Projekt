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
    <table id="zamowienia" >
            <?php
            $conn = new mysqli('localhost','root','','sklep');
            $u = $conn->query("SELECT iduser FROM users WHERE login='".$_SESSION["username"]."';");
            $iduser = $u->fetch_assoc();
            $u2 = $conn->query("SELECT * FROM produkty JOIN zamowienia ON produkty.idproduktu = zamowienia.idproduktu AND zamowienia.iduser=".$iduser["iduser"].";");
            
            echo "<tr><th>Produkty</th><th>Ilość</th><th>Razem</th><th>Data zakupu</th></tr>";
            while($zam = $u2->fetch_assoc())
            {
            echo "<tr><td>".ucfirst($zam["produkt"])."</td><td style='text-align: center;'>".$zam["ilosc"]."</td><td style='text-align: end;'>".$zam["ilosc"]*$zam["cena"]." zł</td><td>".$zam["dnia"]."</td></tr>";
            }
            $conn->close();  
            ?>
    </table>   
</div>
</body>
</html>