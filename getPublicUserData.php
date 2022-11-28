<?php
session_start();
require_once "DatabaseConnection.php";
require_once "Account.php";
require_once "Post.php";

echo json_encode(Account::getPublicUserData($_POST["id"]));