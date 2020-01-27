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
    <input type="button" class="back" value="Wróć" onclick="window.location.href = 'index.php'">
    <div id="logowanie">
    <form name="logowanie" method="post">
        Nazwa użytkownika:<br>
        <input type="text" name="login" maxlength="16"><br>
        Hasło:<br>
        <input type="password" name="password" maxlength="16">
        <div id="blank" style="color: red;"></div>
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
    $sql = "SELECT * FROM users WHERE login='".$login."' limit 1";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($result->num_rows > 0)
    {
        if(password_verify($haslo,$row["password"]))
        {
        $_SESSION["username"] = $login;
            if($login == "admin")
            {
                header("Location: adminpage.php");
            }
            else
            {
                header("Location: index.php");
            }
        }
        else
        {
            echo "<script type='text/javascript'>document.getElementById('blank').innerHTML = 'Błąd';</script>";
        }
    }
    else
    {
        echo "<script type='text/javascript'>document.getElementById('blank').innerHTML = 'Błąd';</script>";
    }
    $conn->close();  
}
?>
