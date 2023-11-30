<?php
namespace app\core;

use Dotenv\Dotenv;
use app\core\Database;

$dotenv = Dotenv::createImmutable(dirname(__DIR__ . '/Quiz_app'));
$dotenv->load();

class AuthController extends Helpers
{
   protected $helpers;
   public function __construct()
   {
      $config = [
         'dsn' => $_ENV['DB_DSN'],
         'username' => $_ENV['DB_USERNAME'],
         'password' => $_ENV['DB_PASSWORD'],
      ];
      $this->db = new Database($config);
      $this->helpers = new Helpers();
   }
   public function register()
   {
      $first_name = $_POST['first_name'] ?? null;
      $last_name = $_POST["last_name"] ?? null;
      $surname = $_POST["surname"] ?? null;
      $groups = $_POST["groups"] ?? null;
      $ticket = $_POST["ticket"] ?? null;

      $_SESSION["valid"] = [];

      if (empty($first_name)) {
         $this->addError("first_name", "Заполните имя!");
      }
      if (empty($last_name)) {
         $this->addError("last_name", "Заполните фамилию!");
      }
      if (empty($groups)) {
         $this->addError("groups", "Заполните группу!");
      }
      // if (!strlen($ticket) == 6) {
      //    addError("ticket", "Укажите правильный номер билета!");
      // }
      if (empty($ticket)) {
         $this->addError("ticket", "Укажите номер билета!");
      }


      if (!empty($_SESSION["valid"])) {
         $this->addOldValue('first_name', $first_name);
         $this->addOldValue("last_name", $last_name);
         $this->addOldValue("groups", $groups);
         $this->addOldValue("ticket", $ticket);
         $this->redirect("/register.php");
      }


      $pdo = $this->getPDO();

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

      $this->redirect('/');
   }

   public function login()
   {
      $ticket = $_POST["ticket"] ?? null;
      $first_name = $_POST["first_name"] ?? null;
      $last_name = $_POST["last_name"] ?? null;

      // TODO: validation ticket input via JS number only
      // TODO: save old input values after validation
      // TODO: all empty fields validation

      if (empty($ticket)) {
         addOldValue('ticket', $ticket);
         addError('ticket', 'Укажите номер студенческого билета');
         setMessage('error', "Ошибка! Проверьте введенные данные!");
         redirect('/');
      }

      $user = findUser($ticket);


      if ((!$user) || empty($user)) {
         addError('ticket', "Билет указан неверно!");
         setMessage('error', "Пользователь $ticket не найден");
         redirect('/');
      }

      if ($first_name != $user['first_name'] || $last_name != $user['last_name']) {
         addOldValue('first_name', $first_name);
         addOldValue('last_name', $last_name);
         addOldValue('ticket', $ticket);
         addError('first_name', 'Неверное имя');
         addError('last_name', 'Неверная фамилия');
         setMessage('error', "Имя или фамилия указаны неверно!");
         redirect('/');
      }

      $_SESSION["user"]['id'] = $user['id'];
      redirect('/home.php');

   }

   public function logout()
   {
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
         $this->logout();
      }

      $this->redirect('/home.php');
   }

}