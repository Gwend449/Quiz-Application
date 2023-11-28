<?php

namespace app\core;
class AuthController
{
   public function __construct()
   {
      $this->help = new Helpers();
   }
   public function register()
   {

   }

   public function logout()
   {
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
         logout();
      }

      redirect('/home.php');
   }

}