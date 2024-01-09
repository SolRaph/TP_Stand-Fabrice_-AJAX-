<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("cobdd.php");
$mot=$_POST["mot"];
$req=$db->prepare("SELECT `nom` FROM `user` WHERE `nom` like ?");
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute(array(trim($mot)."%"));
$tab=$req->fetchAll();
for($i=0;$i<count($tab);$i++){
    echo "<div>".$tab[$i]["nom"]."</div>";
}
?>