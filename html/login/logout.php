<?php
session_start();

$_SESSION["logedIn"] = false;
header("Location: ../../../index.php");