<?php

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$surname = $_POST["surname"];
$groups = $_POST["groups"];
$ticket = $_POST["ticket"];

$errors = [];

if (empty($first_name) || empty($last_name) || empty($surname) || empty($groups) || empty($ticket)) {
   $errors[] = "Пустое поле";
}


