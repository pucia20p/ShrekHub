<?php

require_once "DatabaseConnection.php";
DatabaseConnection::defineTraits("localhost", "root", "", "");

$db = DatabaseConnection::getInstance();
$db->query("drop database if exists ShrekHub");
$db->query("drop database if exists ShrekHub");
$db->query("create database ShrekHub");
$db->query("use Shrekhub");
$db->multi_query(file_get_contents("createDatabase.sql"));