<?php
require_once "DatabaseConnection.php";
require_once "Account.php";


DatabaseConnection::defineTraits("localhost", "root", "", "");
$db = DatabaseConnection::getInstance();
$db->connection->query("drop database if exists ShreksHub");
$db->connection->query("create database  ShreksHub");
$db->connection->query("use Shrekshub");
$db->connection->query(file_get_contents("createDatabase.sql"));
$acc = Account::createNew("puciap@hotmail.com", "anhgnsws", "pexdarkum", "desc", "none");
echo $acc->isPasswordCorrect("anhgnsws");



?>