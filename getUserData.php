<?php
require_once "Account.php";
require_once "DatabaseConnection.php";
session_start();
$con = DatabaseConnection::getInstance();

echo json_encode(array($_SESSION["currentUser"]->id_account, $_SESSION["currentUser"]->nickname, $_SESSION["currentUser"]->descriptions, $con->query("select profile_picture from Accounts where id_account = ".$_SESSION["currentUser"]->id_account)->fetch_array()[0]));