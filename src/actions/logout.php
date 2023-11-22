<?php

require_once __DIR__.'/../helpers.php';
if($_SERVER["REQUES_METHOD"] === "POST")
{
   logout();
}

redirect('/home.php');