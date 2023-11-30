<?php
namespace app\core;

use Dotenv\Dotenv;
use app\core\Database;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class AuthController extends Helpers
{
   private Database $db;
   protected $helpers;
   public function __construct()
   {
      $config = [
         'db' => [
            'dsn' => $_ENV['DB_DSN'],
            'username' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
         ]
      ];
      $this->db = new Database($config['db']);
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

      $pdo = $this->db->pdo;

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
      } catch (\PDOException $th) {
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
         $this->addOldValue('ticket', $ticket);
         $this->addError('ticket', 'Укажите номер студенческого билета');
         $this->setMessage('error', "Ошибка! Проверьте введенные данные!");
         $this->redirect('/');
      }

      $user = $this->findUser($ticket);


      if ((!$user) || empty($user)) {
         $this->addError('ticket', "Билет указан неверно!");
         $this->setMessage('error', "Пользователь $ticket не найден");
         $this->redirect('/');
      }

      if ($first_name != $user['first_name'] || $last_name != $user['last_name']) {
         $this->addOldValue('first_name', $first_name);
         $this->addOldValue('last_name', $last_name);
         $this->addOldValue('ticket', $ticket);
         $this->addError('first_name', 'Неверное имя');
         $this->addError('last_name', 'Неверная фамилия');
         $this->setMessage('error', "Имя или фамилия указаны неверно!");
         $this->redirect('/');
      }

      $_SESSION["user"]['id'] = $user['id'];
      $this->redirect('/home.php');
   }

   public function findUser(string $ticket): array|bool
   {
      $pdo = $this->db->pdo;
      $stmt = $pdo->prepare("SELECT * FROM users WHERE ticket = :ticket");
      $stmt->execute(['ticket' => $ticket]);
      return $stmt->fetch(\PDO::FETCH_ASSOC);
   }

   public function currentUser(): array|false
   {
      $pdo = $this->db->pdo;
      if (!isset($_SESSION["user"])) {
         return false;
      }

      $userId = $_SESSION["user"]["id"] ?? null;

      $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
      $stmt->execute(['id' => $userId]);
      return $stmt->fetch(\PDO::FETCH_ASSOC);
   }

   public function checkGuest()
   {
      return isset($_SESSION["user"]["id"]);
   }
   public function logout()
   {
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
         unset($_SESSION["user"]['id']);
         $this->redirect('/');
      }

      $this->redirect('/home.php');
   }
}