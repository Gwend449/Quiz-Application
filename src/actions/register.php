<?php
require_once __DIR__ ."/../helpers.php";



$first_name = $_POST['first_name'] ?? null;
$last_name = $_POST["last_name"] ?? null ;
$surname = $_POST["surname"] ?? null;
$groups = $_POST["groups"] ?? null;
$ticket = $_POST["ticket"] ?? null;

$_SESSION["valid"] = [];
addOldValue('first_name', $first_name);
addOldValue("last_name", $last_name);
addOldValue("groups", $groups);
addOldValue("ticket", $ticket);

if (empty($first_name)) {
   addError("first_name", "Заполните имя!");
}
if (empty($last_name)) {
   addError("last_name", "Заполните фамилию!");
}
if (empty($groups)) {
   addError("groups", "Заполните группу!");
}
// if (!strlen($ticket) == 6) {
//    addError("ticket", "Укажите правильный номер билета!");
// }
if (empty($ticket)) {
   addError("ticket", "Укажите номер билета!");
}


if (!empty($_SESSION["valid"])){
   redirect("/register.php");
}


$pdo = getPDO();

$query = "INSERT INTO users (first_name, last_name, surname, ticket, groups) VALUES (:first_name, :last_name, :surname, :ticket, :groups);";
$params = [
   'first_name' => $first_name,
   'last_name' => $last_name,
   'surname' => $surname,
   'ticket' => $ticket,
   'groups' => $groups
];

$stmt = $pdo->prepare($query);
try {
   $stmt->execute($params);
} catch (\Throwable $th) {
   die($th->getMessage());
}
