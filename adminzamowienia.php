<?php include 'header.php'; ?>
<body>
    <div id="menu">
        <?php include 'adminpanel.php'; ?>
    </div>
    
<div id="main">
<br><br><br><br>
<div id="wybierz">
<form method="POST">
Wybierz użytkownika
<select name="user">
<?php
    $conn = new mysqli('localhost','root','','sklep');
    $r = $conn->query("SELECT * FROM users");

    while($row = $r->fetch_assoc())
    {
        if($row["login"]!="admin")
        {
            echo "<option>".$row["login"]."</option>";
        }   
    }

?>
</select>
<input type="submit" value="Sprawdź" name="click">
</form>
</div> 
</div>
</body>
</html>
<?php
if(isset($_REQUEST['click']))
{
    $conn = new mysqli('localhost','root','','sklep');
    $u = $conn->query("SELECT iduser FROM users WHERE login='".strtolower($_POST['user'])."';");
    $iduser = $u->fetch_assoc();
    $u2 = $conn->query("SELECT * FROM produkty JOIN zamowienia ON produkty.idproduktu = zamowienia.idproduktu AND zamowienia.iduser=".$iduser["iduser"].";");
    
    echo "<table id='zamowienia'>";
    echo "<tr><th>Produkty</th><th>Ilość</th><th>Razem</th><th>Data zakupu</th></tr>";
    while($zam = $u2->fetch_assoc())
    {
    echo "<tr><td>".ucfirst($zam["produkt"])."</td><td style='text-align: center;'>".$zam["ilosc"]."</td><td style='text-align: end;'>".$zam["ilosc"]*$zam["cena"]." zł</td><td>".$zam["dnia"]."</td></tr>";
    }
    echo "</table>";
    $conn->close();  
}
?>