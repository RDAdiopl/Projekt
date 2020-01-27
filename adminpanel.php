<input type="button" class="button" value="Produkty" onclick="location.href='adminpage.php'">
<input type="button" class="button" value="Zamówienia" onclick="location.href='adminzamowienia.php'">
<div id="login">
<input type="button" class="button2" name="wyloguj" value="Wyloguj" onclick="location.href='wyloguj.php'"
<?php 
if(isset($_SESSION["username"])) 
{
    echo "style='display: block;'";
}
else 
{
    echo "style='display: none;'";
}
?>
> 
</div>