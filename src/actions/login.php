<?php

require_once __DIR__ . '/../helpers.php';

$ticket = $_POST["ticket"] ?? " ";

if(empty($ticket)) {
   setMessage('error', "Номер студенческого билета не указан");
   redirect('/');
}

$pdo = getPDO();

$stmt = $pdo->prepare("SELECT * FROM users WHERE ticket = :ticket");
$stmt->execute(['ticket' => $ticket]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

echo '<pre>';
var_dump($user);
echo '</pre>';

if (!$user) {
   setMessage('error', "Пользователь $ticket не найден");
   redirect ('/');
}

