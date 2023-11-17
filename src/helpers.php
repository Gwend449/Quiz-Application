<?php 

session_start();

function redirect(string $path)
{
   header(header:"Location: $path");
   die();
}

function displayError($value)
{
   return isset($_SESSION['valid'][$value]) ? $_SESSION["valid"][$value] : "";
}

function checkValid()
{
   return !empty($_SESSION["valid"]) ? " is-invalid" : "";
}