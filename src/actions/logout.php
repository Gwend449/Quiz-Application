<?php
namespace app\src;

use app\components;

if($_SERVER["REQUEST_METHOD"] === "POST")
{
   logout();
}

redirect('/home.php');