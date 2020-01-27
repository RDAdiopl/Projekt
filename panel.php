<div id="menu">
    <input type="button" class="button" value="Strona główna" onclick="location.href='index.php'">
    <input type="button" class="button" value="Produkty" onclick="location.href='sklep.php'">
    <input type="button" class="button" value="Moje zamówienia" onclick="location.href='zamowienia.php'"
    <?php 
        if(isset($_SESSION["username"])) 
        {
            echo "style='display: inline-block;'";
        }
        else 
        {
            echo "style='display: none;'";
        }
    ?>
    >
    <div id="login">
    <input type="button" class="button2" value="Login" onclick="location.href='logowanie.php'"
    <?php 
        if(isset($_SESSION["username"])) 
        {
            echo "style='display: none;'";
        }
        else 
        {
            echo "style='display: block;'";
        }
    ?>
    > 
    <input type="button" class="button2" value="Rejestracja" onclick="location.href='rejestracja.php'"
    <?php 
        if(isset($_SESSION["username"])) 
        {
            echo "style='display: none;'";
        }
        else 
        {
            echo "style='display: block;'";
        }
    ?>
    > 
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
</div>