<?php

if($_SERVER["REQUEST_METHOD"] === "POST")
{
   logout();
}

redirect('/home.php');