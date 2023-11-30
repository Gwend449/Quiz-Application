<?php

namespace app\core;
session_start();
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

   protected function getPDO(): PDO
   {
      try {
         return new PDO('pgsql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
      } catch (\PDOException $th) {
         die("Connection error: " . $th->getMessage());
      }
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

   protected function findUser(string $ticket): array|bool
   {
      $pdo = $this->getPDO();

      $stmt = $pdo->prepare("SELECT * FROM users WHERE ticket = :ticket");
      $stmt->execute(['ticket' => $ticket]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   protected function currentUser(): array|false
   {
      $pdo = $this->getPDO();
      if (!isset($_SESSION["user"])) {
         return false;
      }

      $userId = $_SESSION["user"]["id"] ?? null;

      $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
      $stmt->execute(['id' => $userId]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   protected function logout()
   {
      unset($_SESSION["user"]['id']);
      $this->redirect('/');
   }

   protected function checkGuest()
   {
      if (isset($_SESSION["user"]['id'])) {
         $this->redirect('/home.php');
      }
   }

}
