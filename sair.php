<?php
session_start();
//var_dump(($_SESSION['cLogin']));

unset($_SESSION['cLogin']);

header("Location:index.php");
