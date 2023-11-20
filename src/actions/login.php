<?php

require_once __DIR__ . '/../helpers.php';

$ticket = $_POST["ticket"] ?? null;

$pdo = getPDO();

$stmt = $pdo->prepare("SELECT * FROM users WHERE ticket = :ticket");
$stmt->execute(['ticket' => $ticket]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
   setMessage('error', "Пользователь $ticket не найден");
   redirect ('/');
}