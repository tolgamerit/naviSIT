<?php
 if
 (!defined("include"))
 {
     //basit yönlendirme güvenlik önlemi :)
      echo '<meta http-equiv="refresh" content="0;URL=../index.php">';
       exit();
     }

try {
    //server bilgileri
    $server='localhost';
    $db='navisit';
    $username='root';
    $password='';
     $db = new PDO("mysql:host=$server;dbname=$db", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch ( PDOException $e ){
     print $e->getMessage(); exit();
}
 //site adresi
 $site='localhost/naviSIT/';
$bshrf = 'http://'.$_SERVER['HTTP_HOST'].$site; $print = $db->query("select * from user_login")->fetch(PDO::FETCH_ASSOC); ?>