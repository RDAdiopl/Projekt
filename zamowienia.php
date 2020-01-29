<?php include 'header.php'; ?>
<body>
    <?php include 'panel.php'; ?>
<div id="main">
    <br><br><br><br>
    <table id="zamowienia" >
            <?php
            echo "<tr><th>Produkty</th><th>Ilość</th><th>Razem</th><th>Data zakupu</th></tr>";
            $res = getOrders($_SESSION["username"]);
            while($zam = $res->fetch_assoc())
            {
            echo "<tr><td>".ucfirst($zam["produkt"])."</td><td style='text-align: center;'>".$zam["ilosc"]."</td><td style='text-align: end;'>".$zam["ilosc"]*$zam["cena"]." zł</td><td>".$zam["dnia"]."</td></tr>";
            }
            ?>
    </table>   
</div>
</body>
</html>