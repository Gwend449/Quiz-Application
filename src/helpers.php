<?php
require_once __DIR__ . '/config.php';
session_start();

function redirect(string $path)
{
   header(header: "Location: $path");
   die();
}

function getErrorMessage($value): string
{
   $message = $_SESSION["valid"][$value] ?? "";
   unset($_SESSION["valid"][$value]);
   return $message;
}

function checkValid($value)
{
   return isset($_SESSION["valid"][$value]) ? " is-invalid" : '';
}

function addError(string $field, string $message)
{
   $_SESSION["valid"][$field] = $message;
}

function addOldValue(string $key, mixed $value): void
{
   $_SESSION["old"][$key] = $value;
}

function old(string $key)
{
   $value = $_SESSION["old"][$key] ?? '';
   unset($_SESSION['old'][$key]);
   return $value;
}

function clearValid()
{
   $_SESSION['valid'] = [];
}

//postgre
function getPDO(): PDO
{
   try {
      return new PDO('pgsql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
   } catch (PDOException $th) {
      die("Connection error: " . $th->getMessage());
   }
}

function setMessage(string $key, string $message): void
{
   $_SESSION["message"][$key] = $message;
}

function hasMessage(string $key): bool
{
   return isset($_SESSION["message"][$key]);
}

function getMessage(string $key): string
{
   $message = $_SESSION["message"][$key] ?? '';
   unset($_SESSION["message"][$key]);
   return $message;
}

function findUser(string $ticket): array|bool
{
   $pdo = getPDO();

   $stmt = $pdo->prepare("SELECT * FROM users WHERE ticket = :ticket");
   $stmt->execute(['ticket' => $ticket]);
   return $stmt->fetch(PDO::FETCH_ASSOC);
}

function currentUser(): array|false
{
   $pdo = getPDO();
   if(!isset($_SESSION["user"])) {
      return false;
   }

   $userId = $_SESSION["user"]["id"] ?? null;

   $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
   $stmt->execute(['id' => $userId]);  
   return $stmt->fetch(PDO::FETCH_ASSOC);
}

function logout()
{
   unset($_SESSION["user"]['id']);
   redirect('/');
}

function checkGuest()
{
   if(isset($_SESSION["user"]['id'])){
      redirect('/home.php');
   }
}