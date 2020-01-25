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
    <div id="logowanie">
    <form name="logowanie" method="post">
        Login:<br>
        <input type="text" name="login" maxlength="16"><br>
        Hasło:<br>
        <input type="password" name="password" maxlength="16">
        <div id="blank"></div>
        <input type="submit" name="click"class="button" value="Zaloguj się">
    </form>
    </div>
</body>
</html>
<?php
if(isset($_REQUEST['click']))
{
    $login = $_POST['login'];
    $haslo = $_POST['password'];
    
    
    $conn = new mysqli('localhost','root','','sklep');
    $sql = "SELECT * FROM users WHERE login='".$login."' AND password='".$haslo."' limit 1";

    $result = $conn->query($sql);
 
    if($result->num_rows > 0)
    {
        $_SESSION["username"] = $login;
        header("Location: main.php");
        $conn->close();  
    }
    else
    {
        echo "Błąd";
    }

    
    
   
}
?>
