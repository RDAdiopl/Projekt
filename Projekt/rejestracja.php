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
        <input type="submit" name="click"class="button" value="Zarejestruj się">
    </form>
    </div>
</body>
</html>
<?php
if(isset($_REQUEST['click']))
{
    $login = $_POST['login'];
    $haslo = $_POST['password'];
    
    if (empty($login) || empty($haslo) || strlen($login) <= 3 || strlen($haslo) <= 3) 
    {
        echo "Niepoprawne dane";
    }
    else
    {
        $conn = new mysqli('localhost','root','','sklep');
        

         $sql = "INSERT INTO users (login, password) 
         SELECT '".$login."', '".$haslo."' FROM DUAL 
           WHERE NOT EXISTS (
             SELECT * FROM users
               WHERE login='".$login."'
           )";
        $conn->query($sql);
        $conn->close();
        header("Location: main.php");
        
        
    } 
    
   
}
?>
