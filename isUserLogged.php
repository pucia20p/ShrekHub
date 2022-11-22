<?php
session_start();
if(isset($_SESSION["currentUser"]) && $_SESSION["currentUser"] != "none")
    echo json_encode(array("true"));
else 
    echo json_encode(array("false"));