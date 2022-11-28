<?php
session_start();
$_SESSION["currentUser"] = "none";
header("refresh: 0; index.php");