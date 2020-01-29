<?php
function connectDB()
{
    $conn = new mysqli('localhost','root','','sklep');
    return $conn;
}
function getProducts()
{
    $conn = connectDB();
    $r = $conn->query("SELECT * FROM produkty");
return $r;
}
function buyProduct($user,$product,$ilosc)
{
    $conn = connectDB();
    $u = $conn->query("SELECT iduser FROM users WHERE login='".$user."'");
    $iduser = $u->fetch_assoc();
    $u2 = $conn->query("SELECT idproduktu FROM produkty WHERE produkt='".$product."'");
    $idproduktu = $u2->fetch_assoc();
    $sql = "INSERT INTO zamowienia (iduser, idproduktu, ilosc, dnia) VALUES (".$iduser['iduser'].", ".$idproduktu['idproduktu'].", ".$ilosc.", '".date("Y-m-d")."')";
    $conn->query($sql);
    $u3 = $conn->query("SELECT cena FROM produkty WHERE produkt='".$product."'");
    $cena = $u3->fetch_assoc();
    echo "<script type='text/javascript'>alert('Zapłacono: ".$ilosc*$cena['cena']." zł');</script>";
}
function login($login)
{    
    $conn = connectDB();
    $sql = "SELECT * FROM users WHERE login='".$login."' limit 1";
    $r = $conn->query($sql);
    return $r;
}
function register($login,$haslo)
{
    $conn = connectDB();
    $hash = hash("sha512", $haslo);

    $sql = "INSERT INTO users (login, password) SELECT '".$login."', '".$hash."' FROM DUAL WHERE NOT EXISTS (SELECT * FROM users WHERE login='".$login."')";
    $conn->query($sql);
}
function getOrders($user)
{
    $conn = connectDB();
    $u = $conn->query("SELECT iduser FROM users WHERE login='".$user."'");
    $iduser = $u->fetch_assoc();
    $u2 = $conn->query("SELECT * FROM produkty JOIN zamowienia ON produkty.idproduktu = zamowienia.idproduktu AND zamowienia.iduser=".$iduser["iduser"]."");
    return $u2;
}
function addProducts($name,$price)
{
    $conn = connectDB();
    $sql = "INSERT INTO produkty (produkt,cena) VALUES ('".$name."',".$price.")";
    $conn->query($sql);
}
function deleteProducts($product)
{
    $conn = connectDB();
    $sql = "DELETE FROM produkty WHERE produkt='".$product."'";
    $conn->query($sql);
}
?>