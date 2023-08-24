<?php

include_once "../classes/database.php";

$database = new Database();

$name = $_POST['name'];
$hour = $_POST['hour'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];

$method = $_SERVER['REQUEST_METHOD'];

if(isset($method))
  $database->insert($name, $hour, $date_start, $date_end, "Ativo");

header("Location: ../index.php");