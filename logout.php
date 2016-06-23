<?php
session_name("rent");
session_start();
session_destroy();
header('Location: index.php');
?>