<?php
class Util{
    public static $servername = "localhost"
    public static $username = "root"
    public static $password = ""
    public static $dbname = "barbearia"

public static function con(){
    $conn = new mysqli(
        Self::$servername;
        Self::$username;
        Self::$password;
        Self::$dbname;
    )
}
if ($conn->connect_error) {
    die("Connection failed: ") 
    return $conn;
}
}
$Conn Util::con();

?>