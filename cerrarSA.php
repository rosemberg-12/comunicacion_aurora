<?php
 session_start();
  unset($_SESSION["nombre_admin"]);
  unset($_SESSION["codigo_admin"]);
  unset($_SESSION["id_admin"]);
  session_destroy();
  header("Location: index.php");
  exit;
?>