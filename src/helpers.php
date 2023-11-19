<?php 
require_once __DIR__.'/config.php';
session_start();

// $host = DB_HOST;
// $dbname = DB_NAME;
// $port = DB_PORT;
// $userdb = DB_USERNAME;
// $passdb = DB_PASSWORD;

function redirect(string $path)
{
   header(header:"Location: $path");
   die();
}

function getErrorMessage($value)
{
   $message = $_SESSION["valid"][$value] ?? "";
   unset($_SESSION["valid"][$value]);
   return $message;
}

function checkValid($value)
{
   return isset($_SESSION["valid"][$value]) ? " is-invalid" : "";
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
function getPDO() : PDO
{
   try {
      return new PDO('pgsql:host='. DB_HOST .';port='. DB_PORT .';dbname='. DB_NAME, DB_USERNAME, DB_PASSWORD);
   } catch (PDOException $th) {
      die("Connection error: " . $th->getMessage());
   }
}
