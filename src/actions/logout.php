<?php
echo '<pre>';
var_dump($_SERVER);
echo '</pre>';
require_once __DIR__.'/../helpers.php';
if($_SERVER["REQUEST_METHOD"] === "POST")
{
   logout();
}

redirect('/home.php');