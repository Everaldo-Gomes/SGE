<?php
include_once "../../routers.php";

session_start();
unset($_SESSION['morador_logado']);

header("Location: " . $login_form_path);
exit();
?>
