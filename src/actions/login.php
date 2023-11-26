<?php
namespace app\src;

require_once __DIR__ . '/../helpers.php';


$ticket = $_POST["ticket"] ?? null;
$first_name = $_POST["first_name"] ?? null;
$last_name = $_POST["last_name"] ?? null;

// TODO: validation ticket input via JS number only
// TODO: save old input values after validation
// TODO: all empty fields validation

if(empty($ticket)) {
   addOldValue('ticket', $ticket);
   addError('ticket', 'Укажите номер студенческого билета');
   setMessage('error', "Ошибка! Проверьте введенные данные!");
   redirect('/');
}

$user = findUser($ticket);


if ((!$user) || empty($user)) {
   addError('ticket', "Билет указан неверно!");
   setMessage('error', "Пользователь $ticket не найден");
   redirect ('/');
}

if ($first_name != $user['first_name'] || $last_name != $user['last_name'])
{
   addOldValue('first_name', $first_name);
   addOldValue('last_name', $last_name);
   addOldValue('ticket', $ticket);
   addError('first_name', 'Неверное имя');
   addError('last_name', 'Неверная фамилия');
   setMessage('error', "Имя или фамилия указаны неверно!");
   redirect ('/');
}

$_SESSION["user"]['id'] = $user['id'];
redirect('/home.php');
