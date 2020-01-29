<div id="menu">
    <input type="button" class="button" value="Strona główna" onclick="location.href='index.php'">
    <input type="button" class="button" value="Produkty" onclick="location.href='sklep.php'">
    <?php 

        if(isset($_SESSION["username"])) 
        {
            echo "<div id='login'>";
            echo "<input type='button' class='button2' name='wyloguj' value='Wyloguj' onclick=location.href='wyloguj.php'>";
            echo "</div>";
        }
        else 
        {
            echo "<input type='button' class='button' value='Moje zamówienia' onclick=location.href='zamowienia.php'>";
            echo "<div id='login'>";
            echo "<input type='button' class='button2' value='Login' onclick=location.href='logowanie.php'>";
            echo "<input type='button' class='button2' value='Rejestracja' onclick=location.href='rejestracja.php'>";
            echo "</div>";
        }
    ?>
</div>