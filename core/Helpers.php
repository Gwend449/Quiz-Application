<?php
namespace app\core;
class Helpers
{
   protected function redirect(string $path)
   {
      header(header: "Location: $path");
      die();
   }

   protected function getErrorMessage($value): string
   {
      $message = $_SESSION["valid"][$value] ?? "";
      unset($_SESSION["valid"][$value]);
      return $message;
   }

   protected function checkValid($value)
   {
      return isset($_SESSION["valid"][$value]) ? " is-invalid" : '';
   }

   protected function addError(string $field, string $message)
   {
      $_SESSION["valid"][$field] = $message;
   }

   protected function addOldValue(string $key, mixed $value): void
   {
      $_SESSION["old"][$key] = $value;
   }

   protected function old(string $key)
   {
      $value = $_SESSION["old"][$key] ?? '';
      unset($_SESSION['old'][$key]);
      return $value;
   }

   protected function clearValid()
   {
      $_SESSION['valid'] = [];
   }

   protected function setMessage(string $key, string $message): void
   {
      $_SESSION["message"][$key] = $message;
   }

   protected function hasMessage(string $key): bool
   {
      return isset($_SESSION["message"][$key]);
   }

   protected function getMessage(string $key): string
   {
      $message = $_SESSION["message"][$key] ?? '';
      unset($_SESSION["message"][$key]);
      return $message;
   }
}
