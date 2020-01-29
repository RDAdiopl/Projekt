<?php include 'header.php'; ?>
<body>
    <?php include 'panel.php'; ?>
<div id="main">
    <br><br><br><br>
        <?php
        $res = getProducts();
        while ($row = $res->fetch_assoc())
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
                buyProduct($_SESSION["username"],$_POST["produkt"],$_POST['ilosc']);
            }
    }
    else
    {
        echo "<script type='text/javascript'>alert('Zaloguj się!');</script>";
    }
}
?>
