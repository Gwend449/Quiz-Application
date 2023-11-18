<?php 

session_start();

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
