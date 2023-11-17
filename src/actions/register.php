<?php
require_once __DIR__ ."/../helpers.php";



$first_name = $_POST['first_name'] ?? null;
$last_name = $_POST["last_name"] ?? null ;
$surname = $_POST["surname"] ?? null;
$groups = $_POST["groups"] ?? null;
$ticket = $_POST["ticket"] ?? null;


// some validation
$_SESSION["valid"] = [];

if (empty($first_name)) {
   $_SESSION['valid']['first_name'] = 'Пустое поле';
}

// if (empty($groups) || empty($ticket)) {
//    $_SESSION["valid"][$groups][$ticket] = "Проверьте корректность данных";
// }

if (!empty($_SESSION["valid"])){
   redirect("/register.php");
}


