<?php
$server = "mysql:dbname=" . Db . ";host=" . Server;

try {
    $pdo = new PDO(
        $server,
        User,
        Pass,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    echo "<script>alert('Conectado...')</script>";
} catch (PDOException $e) {
    echo "<script>alert('Error...')</script>";
}
