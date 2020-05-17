<?php
session_start();
require_once('../models/candidat.php');
require_once('../userManagers/User_candidat_Manager.php');

// détruit les variables de session.
session_destroy();
header("Location: http://localhost:8080/tp_php/index.php");
exit();
?>